package controllers.Conseil_et_demande;

import entities.Conseil;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TitledPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import services.ConseilService;

import java.io.IOException;
import java.util.List;

public class ConseilListController {

    @FXML
    private ScrollPane scrollPane;

    @FXML
    private VBox conseilContainer;

    @FXML
    private Button commandesButton;
    @FXML
    private Button DemandesButton;
    @FXML
    private Button demandesButton;

    @FXML
    private Button livraisonsButton;
    @FXML
    private Button conseilTableButton;

    @FXML
    private Button demandeTableButton;
    @FXML
    private Button conseilsButton;

    @FXML
    private Button produitsButton;

    private ConseilService conseilService = new ConseilService();

    @FXML
    private void initialize() {
        refreshConseils();
    }

    private void refreshConseils() {
        conseilContainer.getChildren().clear();
        List<Conseil> conseils = conseilService.getAll();

        for (Conseil conseil : conseils) {
            TitledPane card = new TitledPane();
            card.setText("Conseil #" + conseil.getId());

            VBox content = new VBox();
            content.setSpacing(5);
            content.getChildren().addAll(
                    new Label("Contenu: " + conseil.getContenu()),
                    new Label("Date: " + conseil.getDateConseil()),
                    new Label("Demande ID: " + conseil.getIdDemande())
            );

            HBox buttonBox = new HBox(10);
            Button editButton = new Button("Edit");
            editButton.getStyleClass().addAll("edit-button", "action-button");
            editButton.setOnAction(event -> openEditPage(conseil.getId()));

            Button deleteButton = new Button("Delete");
            deleteButton.getStyleClass().addAll("delete-button", "action-button");
            deleteButton.setOnAction(event -> {
                conseilService.delete(conseil.getId());
                refreshConseils();
            });

            buttonBox.getChildren().addAll(editButton, deleteButton);
            content.getChildren().add(buttonBox);

            card.setContent(content);
            conseilContainer.getChildren().add(card);
        }
    }

    private void openEditPage(int conseilId) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+Demande/ConseilEdit.fxml"));
            Parent root = loader.load();
            ConseilEditController controller = loader.getController();
            controller.setConseilId(conseilId);
            Stage stage = new Stage();
            stage.setTitle("Modifier Conseil");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshConseils());
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
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/LivraisonDisplay.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) livraisonsButton.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle("Livraisons");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void navigateToConseils() {
        // Already on Conseils page, no action needed
    }

    @FXML
    private void navigateToProduits() {
    }

    @FXML
    private void navigateToDemandes(ActionEvent event) {
        try {
            Stage currentStage = (Stage) DemandesButton.getScene().getWindow();

            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+Demande/DemandeList.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Demandes");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void navigateToConseilTable(ActionEvent event) {
        try {
            Stage currentStage = (Stage) conseilTableButton.getScene().getWindow();

            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+demande/ConseilTable.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Conseil Table");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void navigateToDemandeTable(ActionEvent event) {
        try {
            Stage currentStage = (Stage) demandeTableButton.getScene().getWindow();
            currentStage.close();

            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+demande/DemandeList.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Demande Table");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}