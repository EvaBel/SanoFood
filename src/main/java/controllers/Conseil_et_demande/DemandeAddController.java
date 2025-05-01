package controllers.Conseil_et_demande;

import entities.Demande;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import services.DemandeService;
import services.QRCodePopup;

import java.time.LocalDate;

public class DemandeAddController {

    @FXML
    private TextField nomField;

    @FXML
    private TextField contentField;

    @FXML
    private DatePicker dateField;

    @FXML
    private TextField authorIdField;

    @FXML
    private TextField emailField;

    @FXML
    private TextField specialiteField;

    @FXML
    private Label nomError;

    @FXML
    private Label contentError;

    @FXML
    private Label dateError;

    @FXML
    private Label authorIdError;

    @FXML
    private Label emailError;

    @FXML
    private Label specialiteError;

    @FXML
    private Button submitButton;

    private DemandeService demandeService = new DemandeService();

    private static final String NAME_SPECIALITE_REGEX = "^[a-zA-Z\\s-]+$"; // Letters, spaces, hyphens
    private static final String EMAIL_REGEX = "^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$"; // Basic email format
    private static final int MAX_AUTHOR_ID = 9999;

    @FXML
    private void handleSubmit() {
        // Clear previous error messages
        clearErrors();

        String nom = nomField.getText().trim();
        String content = contentField.getText().trim();
        LocalDate dateInscription = dateField.getValue();
        String authorIdText = authorIdField.getText().trim();
        String email = emailField.getText().trim();
        String specialite = specialiteField.getText().trim();

        // Required field validation
        if (nom.isEmpty()) {
            nomError.setText("Le nom est obligatoire");
            return;
        }
        if (content.isEmpty()) {
            contentError.setText("Le contenu est obligatoire");
            return;
        }
        if (dateInscription == null) {
            dateError.setText("La date est obligatoire");
            return;
        }
        if (email.isEmpty()) {
            emailError.setText("L'email est obligatoire");
            return;
        }
        if (specialite.isEmpty()) {
            specialiteError.setText("La spécialité est obligatoire");
            return;
        }

        // Nom validation
        if (nom.length() < 3 || nom.length() > 50) {
            nomError.setText("Le nom doit contenir entre 3 et 50 caractères");
            return;
        }
        if (!nom.matches(NAME_SPECIALITE_REGEX)) {
            nomError.setText("Le nom ne doit contenir que des lettres, espaces ou tirets");
            return;
        }

        // Content validation
        if (content.length() < 10 || content.length() > 500) {
            contentError.setText("Le contenu doit contenir entre 10 et 500 caractères");
            return;
        }

        // Date validation
        if (dateInscription.isBefore(LocalDate.now())) {
            dateError.setText("La date ne peut pas être dans le passé");
            return;
        }

        // AuthorId validation
        Integer authorId = null;
        if (!authorIdText.isEmpty()) {
            try {
                authorId = Integer.parseInt(authorIdText);
                if (authorId <= 0) {
                    authorIdError.setText("L'ID auteur doit être positif");
                    return;
                }
                if (authorId > MAX_AUTHOR_ID) {
                    authorIdError.setText("L'ID auteur ne peut pas dépasser " + MAX_AUTHOR_ID);
                    return;
                }
            } catch (NumberFormatException e) {
                authorIdError.setText("L'ID auteur doit être un nombre entier valide");
                return;
            }
        }

        // Email validation
        if (!email.matches(EMAIL_REGEX)) {
            emailError.setText("L'email doit être valide (ex. user@domain.com)");
            return;
        }
        if (email.length() > 100) {
            emailError.setText("L'email ne peut pas dépasser 100 caractères");
            return;
        }

        // Specialite validation
        if (specialite.length() < 3 || specialite.length() > 50) {
            specialiteError.setText("La spécialité doit contenir entre 3 et 50 caractères");
            return;
        }
        if (!specialite.matches(NAME_SPECIALITE_REGEX)) {
            specialiteError.setText("La spécialité ne doit contenir que des lettres, espaces ou tirets");
            return;
        }

        try {
            Demande newDemande = new Demande(
                    0, nom, content, dateInscription, authorId, email, specialite
            );

            demandeService.create(newDemande);

            String qrData = String.format("Nom: %s\nEmail: %s\nSpécialité: %s", nom, email, specialite);
            QRCodePopup.show(qrData);

            Stage stage = (Stage) submitButton.getScene().getWindow();
            stage.close();
        } catch (Exception e) {
            contentError.setText("Erreur lors de l'ajout: " + e.getMessage());
            e.printStackTrace();
        }

    }

    @FXML
    private void cancel(ActionEvent event) {
        // Close the window without saving
        Stage stage = (Stage) nomField.getScene().getWindow();
        stage.close();
    }

    private void clearErrors() {
        nomError.setText("");
        contentError.setText("");
        dateError.setText("");
        authorIdError.setText("");
        emailError.setText("");
        specialiteError.setText("");
    }
}