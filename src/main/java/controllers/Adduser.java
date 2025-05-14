package sanofood.controllers;

import javafx.event.ActionEvent;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;
import sanofood.models.user;
import javafx.scene.text.Text;
import sanofood.services.userService;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;

public class Adduser {

    @FXML
    private TextField email;

    @FXML
    private TextField lastname;

    @FXML
    private Text login;

    @FXML
    private TextField name;

    @FXML
    private PasswordField pass;

    private userService us= new userService();
    @FXML
    void save(ActionEvent event) {
       us.ajouter(new user(email.getText(),name.getText(),lastname.getText(),pass.getText()));
        Alert alert = new Alert(AlertType.INFORMATION);
        alert.setTitle("User Added");
        alert.setHeaderText(null);
        alert.setContentText("User has been added successfully!");
        alert.showAndWait();
        try {
            // Load the forgot password screen
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/login.fxml"));
            Parent root = loader.load();

            // Get current stage
            Stage stage = (Stage) email.getScene().getWindow();

            // Set new scene
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    @FXML
    void goToLogin(ActionEvent event) {
        try {
            // Load the forgot password screen
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/login.fxml"));
            Parent root = loader.load();

            // Get current stage
            Stage stage = (Stage) email.getScene().getWindow();

            // Set new scene
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
