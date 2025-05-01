package controllers.Commande_et_livrasion;

import entities.Commande;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TitledPane;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import services.CommandeService;

import java.io.IOException;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;

public class CommandeController implements Initializable {

    @FXML
    private VBox commandeContainer;

    private CommandeService commandeService = new CommandeService();

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        List<Commande> commandes = commandeService.getAll();

        for (Commande cmd : commandes) {
            TitledPane card = new TitledPane();
            card.setText("Commande #" + cmd.getId());

            VBox content = new VBox();
            content.setSpacing(5);

            // Commande details
            content.getChildren().addAll(
                    new Label("📦 Status: " + cmd.getStatus()),
                    new Label("📍 Adresse: " + cmd.getDeliveryAddress()),
                    new Label("📞 Téléphone: " + cmd.getPhone()),
                    new Label("💳 Paiement: " + cmd.getPaymentMethod()),
                    new Label("💰 Total: " + cmd.getTotalPrice() + " TND"),
                    new Label("🕒 Date: " + cmd.getDateCreation())
            );

            // Add Livrer button
            Button livrerButton = new Button("🚚 Livrer");
            livrerButton.getStyleClass().addAll("btn-livrer", "action-button");
            livrerButton.setOnAction(event -> {
                try {
                    openLivraisonPage(cmd.getId(), event);
                } catch (IOException e) {
                    e.printStackTrace();
                }
            });
            content.getChildren().add(livrerButton);

            card.setContent(content);
            commandeContainer.getChildren().add(card);
        }
    }

    private void openLivraisonPage(int commandeId, ActionEvent event) throws IOException {
        // Close current stage
        Stage currentStage = (Stage) ((Button) event.getSource()).getScene().getWindow();
        currentStage.close();

        FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonForm.fxml"));
        Parent root = loader.load();

        // Pass commandeId to LivraisonController
        LivraisonController controller = loader.getController();
        controller.setCommandeId(commandeId);

        Stage stage = new Stage();
        stage.setTitle("Ajouter Livraison");
        stage.setScene(new Scene(root));
        stage.show();
    }

    @FXML
    private void openLivraisonsPage(ActionEvent event) {
        try {
            // Close current stage
            Stage currentStage = (Stage) ((Button) event.getSource()).getScene().getWindow();

            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonTable.fxml"));
            Parent root = loader.load();

            Stage stage = new Stage();
            stage.setTitle("Tableau de Bord - Livraisons");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}