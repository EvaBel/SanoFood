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

import java.time.LocalDate;

public class DemandeEditController {

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

    private int demandeId;
    private DemandeService demandeService = new DemandeService();

    private static final String NAME_SPECIALITE_REGEX = "^[a-zA-Z\\s-]+$"; // Letters, spaces, hyphens
    private static final String EMAIL_REGEX = "^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$"; // Basic email format
    private static final int MAX_AUTHOR_ID = 9999;
    private static final int MIN_CONTENT_LENGTH = 10;
    private static final int MAX_CONTENT_LENGTH = 500;

    public void setDemandeId(int demandeId) {
        this.demandeId = demandeId;
        loadDemandeData();
    }

    private void loadDemandeData() {
        Demande demande = demandeService.getById(demandeId);
        if (demande != null) {
            nomField.setText(demande.getNom());
            contentField.setText(demande.getContent());
            dateField.setValue(demande.getDateInscription());
            authorIdField.setText(demande.getAuthorId() != null ? String.valueOf(demande.getAuthorId()) : "");
            emailField.setText(demande.getEmail());
            specialiteField.setText(demande.getSpecialite());
        } else {
            contentError.setText("Erreur: Demande non trouvée");
            submitButton.setDisable(true);
        }
    }

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
        if (content.length() < MIN_CONTENT_LENGTH || content.length() > MAX_CONTENT_LENGTH) {
            contentError.setText("Le contenu doit contenir entre " + MIN_CONTENT_LENGTH + " et " + MAX_CONTENT_LENGTH + " caractères");
            return;
        }
        // Check for excessive whitespace
        if (content.contains("  ")) {
            contentError.setText("Le contenu ne doit pas contenir plusieurs espaces consécutifs");
            return;
        }
        // Check for repetitive characters (more than 3 identical consecutive characters)
        if (content.matches(".*(.)\\1{3,}.*")) {
            contentError.setText("Le contenu ne doit pas contenir plus de 3 caractères identiques consécutifs");
            return;
        }
        // Check that content does not start or end with punctuation
        if (content.matches("^[.,!?'].*") || content.matches(".*[.,!?']$")) {
            contentError.setText("Le contenu ne doit pas commencer ou se terminer par une ponctuation");
            return;
        }

        // Date validation
        if (dateInscription.isAfter(LocalDate.now())) {
            dateError.setText("La date ne peut pas être dans le futur");
            return;
        }
        // Check if date is before year 2000
        if (dateInscription.isBefore(LocalDate.of(2000, 1, 1))) {
            dateError.setText("La date ne peut pas être antérieure à l'an 2000");
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
                // Check authorId length (max 4 digits)
                if (authorIdText.length() > 4) {
                    authorIdError.setText("L'ID auteur ne doit pas dépasser 4 chiffres");
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
            Demande updatedDemande = new Demande(
                    demandeId,
                    nom,
                    content,
                    dateInscription,
                    authorId,
                    email,
                    specialite
            );

            demandeService.update(updatedDemande);
            Stage stage = (Stage) submitButton.getScene().getWindow();
            stage.close();
        } catch (Exception e) {
            contentError.setText("Erreur lors de la modification: " + e.getMessage());
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