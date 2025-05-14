package sanofood.db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class database {
    private Connection connection;
    private static database instance;
    private final String URL = "jdbc:mysql://localhost:3306/sanofoodjava";
    private final String USERNAME = "root";
    private final String PASSWORD = "";

    private database() {
        try {
            connection = DriverManager.getConnection(URL, USERNAME, PASSWORD);
            System.out.println("Connected to database");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public static database getInstance() {
        if(instance == null)
            instance = new database();
        return instance;
    }
    public Connection getConnection() {
        return connection;
    }
}
