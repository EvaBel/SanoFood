package sanofood.controllers;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import sanofood.models.user;
import sanofood.services.PasswordHashing;
import sanofood.services.userService;
import java.util.List;

public class Login {
    @FXML
    private TextField email;

    @FXML
    private PasswordField password;

    @FXML
    private Button loginButton;

    private final userService userService = new userService();
    private final PasswordHashing passwordHashing = new PasswordHashing();

    @FXML
    void handleLogin(ActionEvent event) {
        String userEmail = email.getText();
        String userPassword = password.getText();

        if (userEmail.isEmpty() || userPassword.isEmpty()) {
            showAlert("Error", "Please enter both email and password");
            return;
        }
//        try {
//            List<user> users = userService.rechercher();
//            boolean isValid = false;
//            for (user u : users) {
//                if (u.getEmail().equals(userEmail)) {
//                    String hashedPassword = passwordHashing.doHashing(userPassword);
//                    System.out.println(hashedPassword);
//                    System.out.println(userService.retrievePassword(u.getEmail()));
//                    if (hashedPassword.equals(userService.retrievePassword(u.getEmail()))) {
//                        isValid = true;
//                        user ActiveUser = u;
//                        break;
//                    }
//                }
//            }
//
//            if (isValid) {
//                loadMainScene();
//            } else {
//                showAlert("Error", "Invalid email or password");
//            }
//        } catch (Exception e) {
//            showAlert("Error", "Login failed: " + e.getMessage());
//            e.printStackTrace();
//        }
        try {
            String storedHash = userService.retrievePassword(userEmail);
            if (storedHash != null && PasswordHashing.verifyPassword(userPassword, storedHash)) {
                user activeUser = userService.getUserByEmail(userEmail);
                System.out.println("Main app");
            } else {
                showAlert("Error", "Invalid email or password");
            }
        } catch (Exception e) {
            showAlert("Error", "Login failed: " + e.getMessage());
            e.printStackTrace();
        }
    }

    @FXML
    void goToPass(ActionEvent event) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/forgotpass.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) email.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void loadMainScene() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/main.fxml"));
            Parent root = loader.load();
            Stage stage = (Stage) loginButton.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.show();
        } catch (Exception e) {
            showAlert("Error", "Could not load main scene: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void showAlert(String title, String content) {
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(content);
        alert.showAndWait();
    }
}