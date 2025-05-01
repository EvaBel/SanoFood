package controllers.Commande_et_livrasion;

import entities.Commande;
import entities.Livraison;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import services.CommandeService;
import services.EmailService;
import services.LivraisonService;

import java.time.LocalDateTime;

public class LivraisonController {

    @FXML private Label titleLabel;

    @FXML private TextField livreurField;
    @FXML private Label livreurError;

    @FXML private TextField livreurPhoneField;
    @FXML private Label phoneError;

    @FXML private TextField trackingField;
    @FXML private Label trackingError;

    @FXML private Button submitButton;

    private int commandeId;
    private final LivraisonService livraisonService = new LivraisonService();
    private final CommandeService commandeService = new CommandeService();

    public void setCommandeId(int commandeId) {
        this.commandeId = commandeId;
        titleLabel.setText("🚚 Ajouter Livraison pour Commande #" + commandeId);
    }

    private void clearErrors() {
        livreurError.setText("");
        phoneError.setText("");
        trackingError.setText("");
    }

    @FXML
    private void handleSubmit() {
        clearErrors();
        boolean isValid = true;

        String livreur = livreurField.getText().trim();
        String phone = livreurPhoneField.getText().trim();
        String tracking = trackingField.getText().trim();

        // Livreur Validation
        if (livreur.isEmpty()) {
            livreurError.setText("Le nom du livreur est requis");
            isValid = false;
        } else if (!livreur.matches("^[A-Za-zÀ-ÿ'\\s-]{3,}$")) {
            livreurError.setText("Nom invalide (3 lettres minimum)");
            isValid = false;
        }

        // Phone Validation
        if (phone.isEmpty()) {
            phoneError.setText("Le téléphone est requis");
            isValid = false;
        } else if (!phone.matches("\\d{8}")) {
            phoneError.setText("Doit contenir exactement 8 chiffres");
            isValid = false;
        }

        // Tracking Validation
        if (tracking.isEmpty()) {
            trackingError.setText("Le code de suivi est requis");
            isValid = false;
        } else if (!tracking.matches("^[A-Za-z0-9\\-]{6,}$")) {
            trackingError.setText("Code invalide (min 6 caractères)");
            isValid = false;
        }

        // Check existing livraison
        boolean livraisonExists = livraisonService.getAll()
                .stream()
                .anyMatch(l -> l.getCommandeId() == commandeId);
        if (livraisonExists) {
            trackingError.setText("Une livraison existe déjà pour cette commande");
            isValid = false;
        }

        if (!isValid) return;

        // Create Livraison
        Livraison livraison = new Livraison(
                0,
                commandeId,
                LocalDateTime.now(),
                "En cours",
                livreur,
                phone,
                tracking
        );

        try {
            // Create livraison
            livraisonService.create(livraison);

            // Retrieve created livraison
            Livraison createdLivraison = livraisonService.getAll()
                    .stream()
                    .filter(l -> l.getCommandeId() == commandeId)
                    .findFirst()
                    .orElseThrow(() -> new RuntimeException("Erreur récupération ID livraison"));

            // Update Commande
            Commande commande = commandeService.getById(commandeId);
            if (commande == null) {
                throw new RuntimeException("Commande #" + commandeId + " introuvable");
            }
            commande.setDeliveryId(createdLivraison.getId());
            commandeService.update(commande);

            // Send email confirmation
            EmailService.sendLivraisonConfirmation(
                    "hassanjebri99@gmail.com", // Replace with user email in production
                    livreur, // Use livreur name as placeholder; replace with actual user name
                    commande,
                    createdLivraison
            );

            // Show success pop-up
            showSuccess("✅ Livraison ajoutée avec succès ! Un email de confirmation a été envoyé.");

            // Close window
            Stage stage = (Stage) submitButton.getScene().getWindow();
            stage.close();

        } catch (Exception e) {
            showError("Erreur: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void showSuccess(String message) {
        Platform.runLater(() -> {
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Succès");
            alert.setHeaderText(null);
            alert.setContentText(message);
            alert.showAndWait();
        });
    }

    private void showError(String message) {
        Platform.runLater(() -> {
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Erreur");
            alert.setHeaderText(null);
            alert.setContentText(message);
            alert.showAndWait();
        });
    }

    @FXML
    public void cancel(ActionEvent event) {
        livreurField.clear();
        livreurPhoneField.clear();
        trackingField.clear();
        clearErrors();
        Stage stage = (Stage) submitButton.getScene().getWindow();
        stage.close();
    }
}