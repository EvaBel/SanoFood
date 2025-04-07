package org.example;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class MainFx extends Application {

    @Override
    public void start(Stage primaryStage) {
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/commande+livraison/CommandeClient.fxml"));
            Scene scene = new Scene(root);
            primaryStage.setScene(scene);
            primaryStage.setTitle("Ajouter");

            // Set a standard window size (e.g., 800x600 pixels)
            primaryStage.setWidth(800);
            primaryStage.setHeight(600);

            // Optional: Prevent resizing to maintain consistent size
            primaryStage.setResizable(false);

            primaryStage.show();

        } catch (IOException ex) {
            System.out.println("Erreur de chargement FXML: " + ex.getMessage());
        }
    }

    public static void main(String[] args) {
        launch(args);
    }
}