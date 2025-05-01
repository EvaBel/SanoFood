package controllers.Commande_et_livrasion;

import entities.Livraison;
import javafx.collections.FXCollections;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.ComboBox;
import javafx.scene.control.DatePicker;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import services.LivraisonService;

import java.time.LocalDate;
import java.time.LocalDateTime;

public class LivraisonEditController {

    @FXML
    private Label titleLabel;

    @FXML
    private TextField commandeIdField;

    @FXML
    private DatePicker dateLivraisonPicker;

    @FXML
    private ComboBox<String> statutComboBox;

    @FXML
    private TextField livreurField;

    @FXML
    private TextField livreurPhoneField;

    @FXML
    private TextField trackingField;

    @FXML
    private Label errorLabel;

    @FXML
    private Button submitButton;

    private int livraisonId;
    private LivraisonService livraisonService = new LivraisonService();

    @FXML
    private void initialize() {
        // Populate ComboBox with statut options
        statutComboBox.setItems(FXCollections.observableArrayList(
                "En cours",
                "Livré",
                "Annulé",
                "En attente"
        ));
    }

    public void setLivraisonId(int livraisonId) {
        this.livraisonId = livraisonId;
        loadLivraisonData();
    }

    private void loadLivraisonData() {
        Livraison livraison = livraisonService.getById(livraisonId);
        if (livraison != null) {
            titleLabel.setText("Modifier Livraison #" + livraisonId);
            commandeIdField.setText(String.valueOf(livraison.getCommandeId()));
            if (livraison.getDateLivraison() != null) {
                dateLivraisonPicker.setValue(livraison.getDateLivraison().toLocalDate());
            }
            statutComboBox.setValue(livraison.getStatut()); // Set ComboBox value
            livreurField.setText(livraison.getLivreur());
            livreurPhoneField.setText(livraison.getLivreurPhone());
            trackingField.setText(livraison.getTrackingNumber());
        } else {
            errorLabel.setText("Erreur: Livraison non trouvée");
            submitButton.setDisable(true);
        }
    }

    @FXML
    private void handleSubmit() {
        String commandeIdText = commandeIdField.getText().trim();
        LocalDate dateLivraison = dateLivraisonPicker.getValue();
        String statut = statutComboBox.getValue();
        String livreur = livreurField.getText().trim();
        String phone = livreurPhoneField.getText().trim();
        String tracking = trackingField.getText().trim();

        // Validation
        if (commandeIdText.isEmpty() || dateLivraison == null || statut == null || livreur.isEmpty() || phone.isEmpty() || tracking.isEmpty()) {
            errorLabel.setText("Tous les champs sont obligatoires");
            return;
        }

        if (!phone.matches("\\d{8}")) {
            errorLabel.setText("Le téléphone doit contenir 8 chiffres");
            return;
        }

        try {
            int commandeId = Integer.parseInt(commandeIdText);

            // Create updated Livraison
            Livraison livraison = new Livraison(
                    livraisonId,
                    commandeId,
                    dateLivraison.atStartOfDay(), // Convert LocalDate to LocalDateTime
                    statut,
                    livreur,
                    phone,
                    tracking
            );

            // Update Livraison
            livraisonService.update(livraison);

            // Close window
            Stage stage = (Stage) submitButton.getScene().getWindow();
            stage.close();
        } catch (NumberFormatException e) {
            errorLabel.setText("ID Commande doit être un nombre");
        } catch (Exception e) {
            errorLabel.setText("Erreur lors de la modification: " + e.getMessage());
            e.printStackTrace();
        }
    }

    public void cancel(ActionEvent actionEvent) {
        livreurField.clear();
        livreurPhoneField.clear();
        trackingField.clear();
    }
}