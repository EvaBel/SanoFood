package controllers.Commande_et_livrasion;

import entities.Commande;
import entities.Livraison;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TitledPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import services.CommandeService;
import services.LivraisonService;

import java.io.IOException;
import java.util.List;
import java.util.Optional;

public class LivraisonDisplayController {

    @FXML
    private VBox livraisonContainer;

    @FXML
    private Button commandesButton;

    @FXML
    private Button livraisonsButton;

    @FXML
    private Button produitsButton;

    private LivraisonService livraisonService = new LivraisonService();

    @FXML
    private void initialize() {
        refreshLivraisons();
    }

    private void refreshLivraisons() {
        livraisonContainer.getChildren().clear();
        List<Livraison> livraisons = livraisonService.getAll();

        for (Livraison livraison : livraisons) {
            TitledPane card = new TitledPane();
            card.setText("Livraison #" + livraison.getId());

            VBox content = new VBox();
            content.setSpacing(5);
            content.getChildren().addAll(
                    new Label("Commande ID: " + livraison.getCommandeId()),
                    new Label("📅 Date Livraison: " + (livraison.getDateLivraison() != null ? livraison.getDateLivraison() : "N/A")),
                    new Label("📦 Statut: " + livraison.getStatut()),
                    new Label("🚚 Livreur: " + livraison.getLivreur()),
                    new Label("📞 Téléphone: " + livraison.getLivreurPhone()),
                    new Label("🔢 Tracking: " + livraison.getTrackingNumber())
            );

            // Buttons
            HBox buttonBox = new HBox(10);
            Button editButton = new Button("Edit");
            editButton.setOnAction(event -> openEditPage(livraison.getId()));

            Button deleteButton = new Button("Delete");
            deleteButton.setOnAction(event -> {
                livraisonService.delete(livraison.getId());
                // Update Commande to remove delivery_id reference
                CommandeService commandeService = new CommandeService();
                Optional<Commande> commande = commandeService.getAll()
                        .stream()
                        .filter(c -> c.getDeliveryId() != null && c.getDeliveryId() == livraison.getId())
                        .findFirst();
                commande.ifPresent(c -> {
                    c.setDeliveryId(null);
                    commandeService.update(c);
                });
                refreshLivraisons();
            });

            buttonBox.getChildren().addAll(editButton, deleteButton);
            content.getChildren().add(buttonBox);

            card.setContent(content);
            livraisonContainer.getChildren().add(card);
        }
    }

    private void openEditPage(int livraisonId) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonEdit.fxml"));
            Parent root = loader.load();

            LivraisonEditController controller = loader.getController();
            controller.setLivraisonId(livraisonId);

            Stage stage = new Stage();
            stage.setTitle("Modifier Livraison");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshLivraisons());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void openAddPage(ActionEvent actionEvent) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonForm.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Ajouter Livraison");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshLivraisons());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void navigateToCommandes() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/CommandeClient.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) commandesButton.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("Commandes");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void navigateToLivraisons() {
        // Already on Livraisons page, no action needed
    }

    @FXML
    private void navigateToProduits() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/Produits.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) produitsButton.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("Produits");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}