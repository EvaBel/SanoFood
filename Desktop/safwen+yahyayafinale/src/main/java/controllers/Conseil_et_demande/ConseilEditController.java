package controllers.Conseil_et_demande;

import entities.Conseil;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import services.ConseilService;

import java.time.LocalDate;
import java.time.LocalDateTime;

public class ConseilEditController {

    @FXML
    private Label titleLabel;

    @FXML
    private TextField contentField;

    @FXML
    private DatePicker dateField;

    @FXML
    private TextField demandeIdField;

    @FXML
    private Label contentError;

    @FXML
    private Label dateError;

    @FXML
    private Label demandeIdError;

    @FXML
    private Button submitButton;

    private int conseilId;
    private ConseilService conseilService = new ConseilService();

    private static final int MIN_CONTENT_LENGTH = 10;
    private static final int MAX_CONTENT_LENGTH = 500;

    public void setConseilId(int conseilId) {
        this.conseilId = conseilId;
        loadConseilData();
    }

    private void loadConseilData() {
        Conseil conseil = conseilService.getById(conseilId);
        if (conseil != null) {
            if (titleLabel != null) {
                titleLabel.setText("Modifier Conseil #" + conseilId);
            }
            contentField.setText(conseil.getContenu());
            dateField.setValue(conseil.getDateConseil() != null ? conseil.getDateConseil().toLocalDate() : null);
            demandeIdField.setText(String.valueOf(conseil.getIdDemande()));
        } else {
            contentError.setText("Erreur: Conseil non trouvé");
            if (submitButton != null) {
                submitButton.setDisable(true);
            }
        }
    }

    @FXML
    private void handleSubmit() {
        clearErrors();

        String content = contentField.getText().trim();
        LocalDate date = dateField.getValue();
        String demandeIdText = demandeIdField.getText().trim();

        // Required field validation
        if (content.isEmpty()) {
            contentError.setText("Le contenu est obligatoire");
            return;
        }
        if (date == null) {
            dateError.setText("La date est obligatoire");
            return;
        }
        if (demandeIdText.isEmpty()) {
            demandeIdError.setText("L'ID demande est obligatoire");
            return;
        }

        // Content validation
        if (content.length() < MIN_CONTENT_LENGTH || content.length() > MAX_CONTENT_LENGTH) {
            contentError.setText("Le contenu doit contenir entre " + MIN_CONTENT_LENGTH + " et " + MAX_CONTENT_LENGTH + " caractères");
            return;
        }
        if (content.contains("  ")) {
            contentError.setText("Le contenu ne doit pas contenir plusieurs espaces consécutifs");
            return;
        }
        if (content.matches(".*(.)\\1{3,}.*")) {
            contentError.setText("Le contenu ne doit pas contenir plus de 3 caractères identiques consécutifs");
            return;
        }
        if (content.matches("^[.,!?'].*") || content.matches(".*[.,!?']$")) {
            contentError.setText("Le contenu ne doit pas commencer ou se terminer par une ponctuation");
            return;
        }

        // Date validation
        if (date.isAfter(LocalDate.now())) {
            dateError.setText("La date ne peut pas être dans le futur");
            return;
        }
        if (date.isBefore(LocalDate.of(2000, 1, 1))) {
            dateError.setText("La date ne peut pas être antérieure à l'an 2000");
            return;
        }

        // Demande ID validation
        int idDemande;
        try {
            idDemande = Integer.parseInt(demandeIdText);
            if (idDemande <= 0 || demandeIdText.length() > 4) {
                demandeIdError.setText("L'ID demande doit être positif et au plus 4 chiffres");
                return;
            }
        } catch (NumberFormatException e) {
            demandeIdError.setText("L'ID demande doit être un nombre valide");
            return;
        }

        try {
            LocalDateTime dateTime = date.atStartOfDay();
            Conseil updatedConseil = new Conseil(conseilId, idDemande, content, dateTime);
            conseilService.update(updatedConseil);
            Stage stage = (Stage) submitButton.getScene().getWindow();
            stage.close();
        } catch (Exception e) {
            contentError.setText("Erreur lors de la modification: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    private void cancel(ActionEvent actionEvent) {
        Stage stage = (Stage) contentField.getScene().getWindow();
        stage.close();
    }

    private void clearErrors() {
        contentError.setText("");
        dateError.setText("");
        demandeIdError.setText("");
    }
}