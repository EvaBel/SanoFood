package services;

import entities.Livraison;
import utilities.Myconnection;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class LivraisonService implements CrudInterface<Livraison> {
    private Connection cnx;

    public LivraisonService() {
        cnx = Myconnection.getInstance().getCnx();
    }

    @Override
    public void create(Livraison livraison) {
        String query = "INSERT INTO livraison (commande_id, date_livraison, statut, livreur, livreur_phone, tracking_number) VALUES (?, ?, ?, ?, ?, ?)";
        try (PreparedStatement pst = cnx.prepareStatement(query, Statement.RETURN_GENERATED_KEYS)) {
            pst.setInt(1, livraison.getCommandeId());
            // Guard against null dateLivraison
            if (livraison.getDateLivraison() != null) {
                pst.setTimestamp(2, Timestamp.valueOf(livraison.getDateLivraison()));
            } else {
                pst.setTimestamp(2, Timestamp.valueOf(LocalDateTime.now()));
            }
            pst.setString(3, livraison.getStatut());
            pst.setString(4, livraison.getLivreur());
            pst.setString(5, livraison.getLivreurPhone());
            pst.setString(6, livraison.getTrackingNumber());
            int affectedRows = pst.executeUpdate();
            if (affectedRows > 0) {
                try (ResultSet rs = pst.getGeneratedKeys()) {
                    if (rs.next()) {
                        livraison.setId(rs.getInt(1)); // Set the generated ID
                    }
                }
                System.out.println("Livraison added successfully with ID: " + livraison.getId());
            }
        } catch (SQLException ex) {
            System.err.println("Error adding Livraison: " + ex.getMessage());
            throw new RuntimeException(ex); // Rethrow to handle in controller
        }
    }

    @Override
    public void update(Livraison livraison) {
        String query = "UPDATE livraison SET commande_id=?, date_livraison=?, statut=?, livreur=?, livreur_phone=?, tracking_number=? WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, livraison.getCommandeId());
            if (livraison.getDateLivraison() != null) {
                pst.setTimestamp(2, Timestamp.valueOf(livraison.getDateLivraison()));
            } else {
                pst.setTimestamp(2, Timestamp.valueOf(LocalDateTime.now()));
            }
            pst.setString(3, livraison.getStatut());
            pst.setString(4, livraison.getLivreur());
            pst.setString(5, livraison.getLivreurPhone());
            pst.setString(6, livraison.getTrackingNumber());
            pst.setInt(7, livraison.getId());
            pst.executeUpdate();
            System.out.println("Livraison updated successfully");
        } catch (SQLException ex) {
            System.err.println("Error updating Livraison: " + ex.getMessage());
            throw new RuntimeException(ex);
        }
    }

    @Override
    public void delete(int id) {
        String query = "DELETE FROM livraison WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            pst.executeUpdate();
            System.out.println("Livraison deleted successfully");
        } catch (SQLException ex) {
            System.err.println("Error deleting Livraison: " + ex.getMessage());
            throw new RuntimeException(ex);
        }
    }

    @Override
    public Livraison getById(int id) {
        String query = "SELECT * FROM livraison WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return new Livraison(
                        rs.getInt("id"),
                        rs.getInt("commande_id"),
                        rs.getTimestamp("date_livraison") != null ? rs.getTimestamp("date_livraison").toLocalDateTime() : null,
                        rs.getString("statut"),
                        rs.getString("livreur"),
                        rs.getString("livreur_phone"),
                        rs.getString("tracking_number")
                );
            }
        } catch (SQLException ex) {
            System.err.println("Error retrieving Livraison: " + ex.getMessage());
        }
        return null;
    }

    @Override
    public List<Livraison> getAll() {
        List<Livraison> list = new ArrayList<>();
        String query = "SELECT * FROM livraison";
        try (PreparedStatement pst = cnx.prepareStatement(query);
             ResultSet rs = pst.executeQuery()) {
            while (rs.next()) {
                list.add(new Livraison(
                        rs.getInt("id"),
                        rs.getInt("commande_id"),
                        rs.getTimestamp("date_livraison") != null ? rs.getTimestamp("date_livraison").toLocalDateTime() : null,
                        rs.getString("statut"),
                        rs.getString("livreur"),
                        rs.getString("livreur_phone"),
                        rs.getString("tracking_number")
                ));
            }
        } catch (SQLException ex) {
            System.err.println("Error retrieving Livraisons: " + ex.getMessage());
        }
        return list;
    }

    // Add method to check for existing Livraison by commandeId
    public Livraison getByCommandeId(int commandeId) {
        String query = "SELECT * FROM livraison WHERE commande_id = ?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, commandeId);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return new Livraison(
                        rs.getInt("id"),
                        rs.getInt("commande_id"),
                        rs.getTimestamp("date_livraison") != null ? rs.getTimestamp("date_livraison").toLocalDateTime() : null,
                        rs.getString("statut"),
                        rs.getString("livreur"),
                        rs.getString("livreur_phone"),
                        rs.getString("tracking_number")
                );
            }
        } catch (SQLException ex) {
            System.err.println("Error retrieving Livraison by commandeId: " + ex.getMessage());
        }
        return null;
    }
}