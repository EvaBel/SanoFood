module sanofood {
    requires javafx.controls;
    requires javafx.fxml;
    requires javafx.graphics;
    requires javafx.base;
    requires java.sql;
    requires jakarta.mail;
    requires org.apache.commons.lang3;
    requires bcrypt;

    // Remove the requires angus.mail line completely
    uses jakarta.mail.util.StreamProvider;

    exports sanofood.controllers;
    exports sanofood;
    exports sanofood.services;

    opens sanofood.controllers to javafx.fxml;
    opens sanofood to javafx.fxml, javafx.graphics;
    opens sanofood.services;
}