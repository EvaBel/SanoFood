package controllers.Conseil_et_demande;

import entities.Demande;
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
import services.DemandeService;

import java.io.IOException;
import java.util.List;

public class DemandeListController {

    @FXML
    private ScrollPane scrollPane;

    @FXML
    private VBox demandeContainer;

    @FXML
    private Button addButton;

    @FXML
    private Button demandesButton;

    private DemandeService demandeService = new DemandeService();

    @FXML
    private void initialize() {
        refreshDemandes();
    }

    @FXML
    private void openAddPage() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+Demande/DemandeAdd.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Ajouter Demande");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshDemandes());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
            showError("Erreur lors de l'ouverture de la page d'ajout");
        }
    }

    @FXML
    private void openConseilList() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+Demande/ConseilList.fxml"));
            Parent root = loader.load();
            Stage stage = new Stage();
            stage.setTitle("Liste des Conseils");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
            showError("Erreur lors de l'ouverture de la liste des conseils");
        }
    }

    private void refreshDemandes() {
        try {
            demandeContainer.getChildren().clear();
            List<Demande> demandes = demandeService.getAll();
            if (demandes == null || demandes.isEmpty()) {
                demandeContainer.getChildren().add(new Label("Aucune demande trouvée."));
                return;
            }

            for (Demande demande : demandes) {
                TitledPane card = new TitledPane();
                card.setText("Demande #" + demande.getId() + " - " + demande.getNom());

                VBox content = new VBox();
                content.setSpacing(5);
                content.getChildren().addAll(
                        new Label("📝 Contenu: " + demande.getContent()),
                        new Label("📅 Date: " + demande.getDateInscription()),
                        new Label("🆔 Auteur ID: " + (demande.getAuthorId() != null ? demande.getAuthorId() : "N/A")),
                        new Label("📧 Email: " + demande.getEmail()),
                        new Label("💼 Spécialité: " + demande.getSpecialite())
                );

                HBox buttonBox = new HBox(10);
                Button editButton = new Button("✏️ Modifier");
                editButton.setStyle("-fx-background-color: #4CAF50; -fx-text-fill: white;");
                editButton.setOnAction(event -> openEditPage(demande.getId()));

                Button deleteButton = new Button("🗑️ Supprimer");
                deleteButton.setStyle("-fx-background-color: #FF4444; -fx-text-fill: white;");
                deleteButton.setOnAction(event -> {
                    try {
                        demandeService.delete(demande.getId());
                        refreshDemandes();
                    } catch (Exception e) {
                        e.printStackTrace();
                        showError("Erreur lors de la suppression de la demande");
                    }
                });

                Button addConseilButton = new Button("➕ Ajouter Conseil");
                addConseilButton.setStyle("-fx-background-color: #2196F3; -fx-text-fill: white;");
                addConseilButton.setOnAction(event -> openConseilAddPage(demande.getId()));

                buttonBox.getChildren().addAll(editButton, deleteButton, addConseilButton);
                content.getChildren().add(buttonBox);

                card.setContent(content);
                demandeContainer.getChildren().add(card);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void openEditPage(int demandeId) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+Demande/DemandeEdit.fxml"));
            Parent root = loader.load();
            DemandeEditController controller = loader.getController();
            controller.setDemandeId(demandeId);
            Stage stage = new Stage();
            stage.setTitle("Modifier Demande");
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshDemandes());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
            showError("Erreur lors de l'ouverture de la page de modification");
        }
    }

    private void openConseilAddPage(int demandeId) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Conseil+Demande/ConseilAdd.fxml"));
            Parent root = loader.load();
            ConseilAddController controller = loader.getController();
            controller.setDemandeId(demandeId);
            Stage stage = new Stage();
            stage.setTitle("Ajouter Conseil pour Demande #" + demandeId);
            stage.setScene(new Scene(root));
            stage.setOnHidden(event -> refreshDemandes());
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
            showError("Erreur lors de l'ouverture de la page d'ajout de conseil");
        }
    }

    private void showError(String message) {
        Label errorLabel = new Label(message);
        errorLabel.setStyle("-fx-text-fill: red; -fx-font-weight: bold;");
        demandeContainer.getChildren().clear();
        demandeContainer.getChildren().add(errorLabel);
    }
}