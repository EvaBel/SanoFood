package controllers.Commande_et_livrasion;

import entities.Commande;
import entities.Livraison;
import javafx.collections.FXCollections;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.stage.Stage;
import javafx.util.Callback;
import services.CommandeService;
import services.LivraisonService;

import java.time.LocalDateTime;
import java.util.Arrays;
import java.util.List;

public class CommandeEditController {

    private static final List<String> VALID_PAYMENT_METHODS = Arrays.asList("Carte", "Espèces", "PayPal");
    private static final float MAX_TOTAL_PRICE = 10000.0f;

    @FXML private Label titleLabel;
    @FXML private TextField userIdField;
    @FXML private ComboBox<String> statusComboBox;
    @FXML private TextField deliveryAddressField;
    @FXML private TextField phoneField;
    @FXML private TextField paymentMethodField;
    @FXML private TextField totalPriceField;
    @FXML private ComboBox<Livraison> deliveryIdField;
    @FXML private Label errorLabel;
    @FXML private Button submitButton;

    private int commandeId;
    private final CommandeService commandeService = new CommandeService();
    private final LivraisonService livraisonService = new LivraisonService();

    @FXML
    private void initialize() {
        statusComboBox.setItems(FXCollections.observableArrayList("En attente", "Préparée", "Expédiée", "Livrée"));

        // Load livraisons
        deliveryIdField.getItems().add(null); // allow empty
        deliveryIdField.getItems().addAll(livraisonService.getAll());

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
        deliveryIdField.setCellFactory(cellFactory);
        deliveryIdField.setButtonCell(cellFactory.call(null));
    }

    public void setCommandeId(int commandeId) {
        this.commandeId = commandeId;
        loadCommandeData();
    }

    private void loadCommandeData() {
        Commande commande = commandeService.getById(commandeId);
        if (commande != null) {
            titleLabel.setText("Modifier Commande #" + commandeId);
            userIdField.setText(String.valueOf(commande.getUserId()));
            statusComboBox.setValue(commande.getStatus());
            deliveryAddressField.setText(commande.getDeliveryAddress());
            phoneField.setText(commande.getPhone());
            paymentMethodField.setText(commande.getPaymentMethod());
            totalPriceField.setText(String.valueOf(commande.getTotalPrice()));

            if (commande.getDeliveryId() != null) {
                for (Livraison livraison : deliveryIdField.getItems()) {
                    if (livraison != null && livraison.getId() == commande.getDeliveryId()) {
                        deliveryIdField.setValue(livraison);
                        break;
                    }
                }
            }
        } else {
            errorLabel.setText("Erreur: Commande non trouvée");
            submitButton.setDisable(true);
        }
    }

    @FXML
    private void handleSubmit() {
        errorLabel.setText("");

        String userIdText = userIdField.getText().trim();
        String status = statusComboBox.getValue();
        String deliveryAddress = deliveryAddressField.getText().trim();
        String phone = phoneField.getText().trim();
        String paymentMethod = paymentMethodField.getText().trim();
        String totalPriceText = totalPriceField.getText().trim();
        Livraison selectedLivraison = deliveryIdField.getValue();

        if (userIdText.isEmpty() || status == null || deliveryAddress.isEmpty()
                || phone.isEmpty() || paymentMethod.isEmpty() || totalPriceText.isEmpty()) {
            errorLabel.setText("Tous les champs obligatoires doivent être remplis");
            return;
        }

        if (!phone.matches("\\d{8}")) {
            errorLabel.setText("Téléphone invalide");
            return;
        }

        if (!VALID_PAYMENT_METHODS.stream().anyMatch(pm -> pm.equalsIgnoreCase(paymentMethod))) {
            errorLabel.setText("Méthode de paiement invalide (Carte, Espèces, PayPal)");
            return;
        }

        try {
            int userId = Integer.parseInt(userIdText);
            float totalPrice = Float.parseFloat(totalPriceText);
            Integer deliveryId = selectedLivraison != null ? selectedLivraison.getId() : null;

            if (userId <= 0) {
                errorLabel.setText("ID utilisateur invalide");
                return;
            }

            if (totalPrice < 0 || totalPrice > MAX_TOTAL_PRICE) {
                errorLabel.setText("Prix invalide");
                return;
            }

            Commande old = commandeService.getById(commandeId);

            Commande updated = new Commande(
                    commandeId,
                    userId,
                    old.getDateCreation(),
                    status,
                    deliveryAddress,
                    phone,
                    paymentMethod,
                    totalPrice,
                    deliveryId
            );

            commandeService.update(updated);

            Stage stage = (Stage) submitButton.getScene().getWindow();
            stage.close();

        } catch (NumberFormatException e) {
            errorLabel.setText("Champs numériques invalides");
        } catch (Exception e) {
            errorLabel.setText("Erreur lors de la mise à jour");
            e.printStackTrace();
        }
    }
}
