package controllers.Conseil_et_demande;

import entities.Conseil;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;
import services.ConseilService;
import services.TwilioService;

import java.time.LocalDate;
import java.time.LocalDateTime;

public class ConseilAddController {

    @FXML private Label titleLabel;
    @FXML private Label demandeIdLabel;
    @FXML private TextField contentField;
    @FXML private DatePicker dateField;
    @FXML private TextField authorIdField;
    @FXML private Label errorLabel;
    @FXML private Button submitButton;

    private int demandeId;
    private final ConseilService conseilService = new ConseilService();
    private final TwilioService twilioService = new TwilioService();

    private static final int MAX_AUTHOR_ID = 9999;
    private static final int MIN_CONTENT_LENGTH = 10;
    private static final int MAX_CONTENT_LENGTH = 500;

    public void setDemandeId(int demandeId) {
        this.demandeId = demandeId;
        demandeIdLabel.setText("Demande ID: " + demandeId);
    }

    @FXML
    private void handleSubmit() {
        errorLabel.setText("");

        String content = contentField.getText().trim();
        LocalDate localDate = dateField.getValue();
        String authorIdText = authorIdField.getText().trim();

        // Validation
        if (content.isEmpty()) {
            errorLabel.setText("Le contenu est obligatoire");
            return;
        }

        if (localDate == null) {
            errorLabel.setText("La date est obligatoire");
            return;
        }

        if (content.length() < MIN_CONTENT_LENGTH || content.length() > MAX_CONTENT_LENGTH) {
            errorLabel.setText("Le contenu doit contenir entre " + MIN_CONTENT_LENGTH + " et " + MAX_CONTENT_LENGTH + " caractères");
            return;
        }

        if (content.contains("  ")) {
            errorLabel.setText("Le contenu ne doit pas contenir plusieurs espaces consécutifs");
            return;
        }

        if (content.matches(".*(.)\\1{3,}.*")) {
            errorLabel.setText("Le contenu ne doit pas contenir plus de 3 caractères identiques consécutifs");
            return;
        }

        if (content.matches("^[.,!?'].*") || content.matches(".*[.,!?']$")) {
            errorLabel.setText("Le contenu ne doit pas commencer ou se terminer par une ponctuation");
            return;
        }

        if (localDate.isAfter(LocalDate.now())) {
            errorLabel.setText("La date ne peut pas dépasser aujourd'hui");
            return;
        }

        if (localDate.isBefore(LocalDate.of(2000, 1, 1))) {
            errorLabel.setText("La date ne peut pas être antérieure à l'an 2000");
            return;
        }

        Integer authorId = null;
        if (!authorIdText.isEmpty()) {
            try {
                authorId = Integer.parseInt(authorIdText);
                if (authorId <= 0 || authorIdText.length() > 4 || authorId > MAX_AUTHOR_ID) {
                    errorLabel.setText("L'ID auteur doit être entre 1 et " + MAX_AUTHOR_ID + ", 4 chiffres max.");
                    return;
                }
            } catch (NumberFormatException e) {
                errorLabel.setText("L'ID auteur doit être un nombre entier valide");
                return;
            }
        }

        try {
            // Create Conseil
            LocalDateTime dateTime = localDate.atTime(0, 0);
            Conseil newConseil = new Conseil(0, demandeId, content, dateTime);
            conseilService.create(newConseil);

            // Send SMS to fixed phone number
            String userPhoneNumber = "+21698158363";
            String smsMessage = String.format("Nouveau conseil ajouté pour la demande ID %d: %s", demandeId, content);
            twilioService.sendSMS(userPhoneNumber, smsMessage);

            // Show notifications
            showNotification("✅ Succès", "Conseil ajouté avec succès", "success");
            showNotification("✅ Succès", "SMS envoyé à " + userPhoneNumber, "success");

            // Delay closing window to show notifications
            new Thread(() -> {
                try {
                    Thread.sleep(1500); // 1.5s delay
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                Platform.runLater(() -> submitButton.getScene().getWindow().hide());
            }).start();

        } catch (Exception e) {
            errorLabel.setText("Erreur lors de l'ajout: " + e.getMessage());
            showNotification("❌ Erreur", "Erreur ajout conseil: " + e.getMessage(), "error");
        }
    }

    @FXML
    private void cancel(ActionEvent actionEvent) {
        Stage stage = (Stage) contentField.getScene().getWindow();
        stage.close();
    }

    private void showNotification(String title, String message, String type) {
        Notifications notification = Notifications.create()
                .title(title)
                .text(message)
                .position(Pos.TOP_RIGHT)
                .hideAfter(Duration.seconds(4));
        Platform.runLater(() -> {
            if (type.equals("success")) {
                notification.showInformation();
            } else {
                notification.showError();
            }
        });
    }
}