package controllers.Commande_et_livrasion;

import entities.Commande;
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

import java.io.IOException;
import java.util.List;

public class CommandeClientController {

    @FXML
    private VBox commandeContainer;

    @FXML
    private Button addButton;

    @FXML
    private Button livraisonsButton;

    @FXML
    private VBox sidebar;

    private CommandeService commandeService = new CommandeService();

    @FXML
    private void initialize() {
        refreshCommandes();
    }

    @FXML
    private void openAddPage() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/command_add.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Ajouter Commande");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshCommandes());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void openLivraisonsDisplay() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonDisplay.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Liste des Livraisons");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void refreshCommandes() {
        commandeContainer.getChildren().clear();
        List<Commande> commandes = commandeService.getAll();

        for (Commande cmd : commandes) {
            TitledPane card = new TitledPane();
            card.setText("Commande #" + cmd.getId());

            VBox content = new VBox();
            content.setSpacing(5);
            content.getChildren().addAll(
                    new Label("📦 Status: " + cmd.getStatus()),
                    new Label("📍 Adresse: " + cmd.getDeliveryAddress()),
                    new Label("📞 Téléphone: " + cmd.getPhone()),
                    new Label("💳 Paiement: " + cmd.getPaymentMethod()),
                    new Label("💰 Total: " + cmd.getTotalPrice() + " TND"),
                    new Label("🕒 Date: " + cmd.getDateCreation())
            );

            // Buttons
            HBox buttonBox = new HBox(10);

            Button livrerButton = new Button("Livrer");
            livrerButton.getStyleClass().addAll("btn-livrer", "action-button");
            livrerButton.setOnAction(event -> {
                try {
                    openLivraisonPage(cmd.getId());
                } catch (IOException e) {
                    e.printStackTrace();
                }
            });

            Button editButton = new Button("Modifier");
            editButton.getStyleClass().addAll("btn-edit", "action-button");
            editButton.setOnAction(event -> openEditPage(cmd.getId()));

            Button deleteButton = new Button("Supprimer");
            deleteButton.getStyleClass().addAll("btn-delete", "action-button");
            deleteButton.setOnAction(event -> {
                commandeService.delete(cmd.getId());
                refreshCommandes();
            });

            buttonBox.getChildren().addAll(livrerButton, editButton, deleteButton);
            content.getChildren().add(buttonBox);

            card.setContent(content);
            commandeContainer.getChildren().add(card);
        }
    }

    private void openLivraisonPage(int commandeId) throws IOException {
        FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonForm.fxml"));
        Parent root = loader.load();
        LivraisonController controller = loader.getController();
        controller.setCommandeId(commandeId);
        Stage stage = new Stage();
        stage.setTitle("Ajouter Livraison");
        stage.setScene(new Scene(root));
        stage.show();
    }

    private void openEditPage(int commandeId) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/CommandeEdit.fxml"));
            Parent root = loader.load();
            CommandeEditController controller = loader.getController();
            controller.setCommandeId(commandeId);
            Stage stage = new Stage();
            stage.setTitle("Modifier Commande");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshCommandes());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void toggleSidebar(ActionEvent event) {
        sidebar.setVisible(!sidebar.isVisible());
        sidebar.setManaged(!sidebar.isManaged());
    }

    @FXML
    private void openstat(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/CommandeTable.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Statistiques");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void openstatliv(ActionEvent actionEvent) {

        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonTable.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Statistiques");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}