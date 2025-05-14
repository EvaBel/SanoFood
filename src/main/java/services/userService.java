package sanofood.services;
import sanofood.db.database;
import sanofood.models.user;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class userService {
    private Connection connection=database.getInstance().getConnection();
    private PasswordHashing ph= new PasswordHashing();
    public void ajouter(user user) {
        String req = "INSERT INTO user (email, name, lastname,password) VALUES (?, ?, ?, ?)";
        try (var prepStmt = connection.prepareStatement(req)){
            prepStmt.setString(1, user.getEmail());
            prepStmt.setString(2, user.getName());
            prepStmt.setString(3, user.getLastname());
            prepStmt.setString(4, ph.doHashing(user.getPassword()));
            prepStmt.executeUpdate();
            System.out.println("user ajoutée");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public void modifier(user user) {
        String req = "UPDATE user SET email = ?, name = ?, lastname = ? WHERE id = ?";
        try (PreparedStatement prepStmt = connection.prepareStatement(req)) {
            prepStmt.setString(1, user.getEmail());
            prepStmt.setString(2, user.getName());
            prepStmt.setString(3, user.getLastname());
            prepStmt.setInt(4, user.getId());
            prepStmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public void supprimer(user user) {
        String req = "DELETE FROM user WHERE id = ?";
        try (PreparedStatement prepStmt = connection.prepareStatement(req)) {
            prepStmt.setInt(1, user.getId());
            prepStmt.executeUpdate();
            System.out.println("user supprimée");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public List<user> rechercher() {
        List<user> users = new ArrayList<>();
        String req = "SELECT * FROM user";
        try (Statement st = connection.createStatement();
             ResultSet rs = st.executeQuery(req)) {
            while (rs.next()) {
                users.add(new user(rs.getString("email"), rs.getString("name"), rs.getString("lastname"),"0"));
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return users;
    }
    public void changePassword(String email, String newPassword) {
        String req = "UPDATE user SET password = ? WHERE email = ?";
        try (PreparedStatement prepStmt = connection.prepareStatement(req)) {
            prepStmt.setString(1, ph.doHashing(newPassword));
            prepStmt.setString(2, email);
            prepStmt.executeUpdate();
            System.out.println("Password updated successfully");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
}
    public String retrievePassword(String email) {
        String req = "SELECT password FROM user WHERE email = ?";
        try (PreparedStatement prepStmt = connection.prepareStatement(req)) {
            prepStmt.setString(1, email);
            try (ResultSet rs = prepStmt.executeQuery()) {
                if (rs.next()) {
                    return rs.getString("password");
                }
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }
    public user getUserByEmail(String email) {
        String req = "SELECT * FROM user WHERE email = ?";
        try (PreparedStatement prepStmt = connection.prepareStatement(req)) {
            prepStmt.setString(1, email);
            try (ResultSet rs = prepStmt.executeQuery()) {
                if (rs.next()) {
                    user u = new user(
                            rs.getString("email"),
                            rs.getString("name"),
                            rs.getString("lastname"),
                            rs.getString("password")
                    );
                    u.setId(rs.getInt("id"));
                    return u;
                }
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return null;
    }
}
