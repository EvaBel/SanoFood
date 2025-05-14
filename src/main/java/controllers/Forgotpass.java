package sanofood.controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;
import javafx.scene.control.PasswordField;
import javafx.scene.control.Button;
import javafx.event.ActionEvent;
import sanofood.services.EmailService;
import sanofood.services.userService;
import java.util.Random;

public class Forgotpass {
    @FXML
    private TextField email;

    @FXML
    private TextField codeField;

    @FXML
    private PasswordField newPasswordField;

    @FXML
    private Button verifyButton;

    @FXML
    private Button resetButton;

    private String verificationCode;
    private final EmailService emailService = new EmailService();
    private final userService us = new userService();

    @FXML
    void initialize() {
        codeField.setVisible(false);
        newPasswordField.setVisible(false);
        resetButton.setVisible(false);
    }

    @FXML
    void handleVerifyButton(ActionEvent event) {
        if (email.getText().isEmpty()) {
            showAlert("Error", "Please enter your email address");
            return;
        }

        try {
            // Generate random 6-digit code
            verificationCode = String.format("%06d", new Random().nextInt(999999));

            // Send verification code
            emailService.sendVerificationCode(email.getText(), verificationCode);

            // Show verification code field
            codeField.setVisible(true);
            email.setEditable(false);
            verifyButton.setText("Verify Code");
            verifyButton.setOnAction(e -> verifyCode());

            showAlert("Success", "Verification code sent to your email");
        } catch (Exception e) {
            showAlert("Error", "Failed to send verification code: " + e.getMessage());
            e.printStackTrace();
        }
    }

    private void verifyCode() {
        if (codeField.getText().equals(verificationCode)) {
            showAlert("Success", "Email verified successfully!");
            // Show password reset fields
            codeField.setEditable(false);
            newPasswordField.setVisible(true);
            resetButton.setVisible(true);
            verifyButton.setDisable(true);
        } else {
            showAlert("Error", "Invalid verification code");
        }
    }

    @FXML
    void handleResetPassword(ActionEvent event) {
        String newPassword = newPasswordField.getText();
        if (newPassword.isEmpty()) {
            showAlert("Error", "Please enter a new password");
            return;
        }
        try {
            us.changePassword(email.getText(), newPassword);
            showAlert("Success", "Password has been reset successfully");
            // Close the window or navigate to login
            resetButton.getScene().getWindow().hide();
        } catch (Exception e) {
            showAlert("Error", "Failed to reset password: " + e.getMessage());
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