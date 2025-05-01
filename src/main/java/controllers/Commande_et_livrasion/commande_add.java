package controllers.Commande_et_livrasion;

import com.stripe.exception.StripeException;
import entities.Commande;
import entities.Livraison;
import javafx.application.Platform;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import javafx.util.Callback;
import services.CommandeService;
import services.LivraisonService;
import services.PaymentService;

import java.awt.Desktop;
import java.net.URI;
import java.time.LocalDateTime;
import java.util.Comparator;

public class commande_add {

    @FXML private TextField deliveryAddressField;
    @FXML private Label addressError;

    @FXML private TextField phoneField;
    @FXML private Label phoneError;

    @FXML private ComboBox<String> paymentMethodCombo;
    @FXML private Label paymentError;

    @FXML private TextField totalPriceField;
    @FXML private Label priceError;

    @FXML private ComboBox<Livraison> deliveryComboBox;
    @FXML private Label deliveryIdError;

    private final CommandeService commandeService = new CommandeService();
    private final LivraisonService livraisonService = new LivraisonService();
    private final PaymentService paymentService = new PaymentService();

    @FXML
    public void initialize() {
        // Set payment methods
        paymentMethodCombo.getItems().addAll("Carte", "Espèces", "Paypal");

        // Load livraisons
        deliveryComboBox.getItems().add(null); // Optional entry
        deliveryComboBox.getItems().addAll(livraisonService.getAll());

        // Format display for items
        Callback<ListView<Livraison>, ListCell<Livraison>> cellFactory = lv -> new ListCell<>() {
            @Override
            protected void updateItem(Livraison item, boolean empty) {
                super.updateItem(item, empty);
                if (empty || item == null) {
                    setText("Aucune livraison");
                } else {
                    setText("ID #" + item.getId() + " | " + item.getLivreur() + " 📞 " + item.getLivreurPhone());
                }
            }
        };

        deliveryComboBox.setCellFactory(cellFactory);
        deliveryComboBox.setButtonCell(cellFactory.call(null));
    }

    @FXML
    private void handleAddCommande() {
        clearErrors();
        boolean isValid = true;

        String address = deliveryAddressField.getText();
        String phone = phoneField.getText();
        String paymentMethod = paymentMethodCombo.getValue();
        String priceText = totalPriceField.getText();

        // Validation
        if (address == null || address.trim().isEmpty()) {
            addressError.setText("Adresse requise");
            isValid = false;
        }

        if (phone == null || !phone.matches("\\d{8}")) {
            phoneError.setText("Téléphone invalide (8 chiffres)");
            isValid = false;
        }

        if (paymentMethod == null || paymentMethod.isEmpty()) {
            paymentError.setText("Choisissez une méthode");
            isValid = false;
        }

        float price = 0;
        try {
            price = Float.parseFloat(priceText);
            if (price <= 0) {
                priceError.setText("Prix doit être > 0");
                isValid = false;
            }
        } catch (NumberFormatException e) {
            priceError.setText("Prix invalide");
            isValid = false;
        }

        Livraison selectedLivraison = deliveryComboBox.getValue();
        Integer deliveryId = selectedLivraison != null ? selectedLivraison.getId() : null;

        if (!isValid) return;

        // Create commande
        Commande commande = new Commande();
        commande.setUserId(1); // Replace with dynamic session ID
        commande.setDateCreation(LocalDateTime.now());
        commande.setStatus("En attente");
        commande.setDeliveryAddress(address);
        commande.setPhone(phone);
        commande.setPaymentMethod(paymentMethod);
        commande.setTotalPrice(price);
        commande.setDeliveryId(deliveryId);

        try {
            // Persist commande
            commandeService.create(commande);

            // Retrieve the latest commande to get its ID
            Commande savedCommande = commandeService.getAll().stream()
                    .max(Comparator.comparing(Commande::getDateCreation))
                    .orElse(null);

            if (savedCommande == null) {
                showError("Erreur lors de la création de la commande : impossible de récupérer l'ID.");
                return;
            }
            commande.setId(savedCommande.getId());

            // Handle payment for "Carte"
            if ("Carte".equals(paymentMethod)) {
                String checkoutUrl = paymentService.createCheckoutSession(commande);
                // Open the checkout URL in the default browser
                if (Desktop.isDesktopSupported() && Desktop.getDesktop().isSupported(Desktop.Action.BROWSE)) {
                    Desktop.getDesktop().browse(new URI(checkoutUrl));
                } else {
                    showError("Impossible d'ouvrir le navigateur pour le paiement. Lien : " + checkoutUrl);
                    return;
                }
            }

            // Show success and close the form
            showSuccess("✅ Commande ajoutée avec succès !");
            clearForm();
            closeWindow();
        } catch (StripeException e) {
            showError("Erreur lors du paiement : " + e.getMessage());
        } catch (Exception e) {
            showError("Erreur inattendue : " + e.getMessage());
        }
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

    private void showSuccess(String message) {
        Platform.runLater(() -> {
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Succès");
            alert.setHeaderText(null);
            alert.setContentText(message);
            alert.showAndWait();
        });
    }

    private void clearErrors() {
        addressError.setText("");
        phoneError.setText("");
        paymentError.setText("");
        priceError.setText("");
        deliveryIdError.setText("");
    }

    private void clearForm() {
        deliveryAddressField.clear();
        phoneField.clear();
        paymentMethodCombo.getSelectionModel().clearSelection();
        totalPriceField.clear();
        deliveryComboBox.getSelectionModel().clearSelection();
    }

    @FXML
    private void cancel() {
        clearForm();
        clearErrors();
        closeWindow();
    }

    private void closeWindow() {
        Stage stage = (Stage) deliveryAddressField.getScene().getWindow();
        stage.close();
    }
}