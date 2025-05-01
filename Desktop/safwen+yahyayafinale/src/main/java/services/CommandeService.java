
package services;

import entities.Commande;
import utilities.Myconnection;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class CommandeService implements CrudInterface<Commande> {
    private Connection cnx;

    public CommandeService() {
        cnx = Myconnection.getInstance().getCnx();
    }

    @Override
    public void create(Commande commande) {
        String query = "INSERT INTO commande (user_id, date_creation, status, delivery_address, phone, payment_method, total_price, delivery_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, commande.getUserId());
            pst.setTimestamp(2, Timestamp.valueOf(commande.getDateCreation()));
            pst.setString(3, commande.getStatus());
            pst.setString(4, commande.getDeliveryAddress());
            pst.setString(5, commande.getPhone());
            pst.setString(6, commande.getPaymentMethod());
            pst.setFloat(7, commande.getTotalPrice());
            if (commande.getDeliveryId() != null)
                pst.setInt(8, commande.getDeliveryId());
            else
                pst.setNull(8, Types.INTEGER);
            pst.executeUpdate();
            System.out.println("Commande added successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public void update(Commande commande) {
        String query = "UPDATE commande SET user_id=?, date_creation=?, status=?, delivery_address=?, phone=?, payment_method=?, total_price=?, delivery_id=? WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, commande.getUserId());
            pst.setTimestamp(2, Timestamp.valueOf(commande.getDateCreation()));
            pst.setString(3, commande.getStatus());
            pst.setString(4, commande.getDeliveryAddress());
            pst.setString(5, commande.getPhone());
            pst.setString(6, commande.getPaymentMethod());
            pst.setFloat(7, commande.getTotalPrice());
            if (commande.getDeliveryId() != null)
                pst.setInt(8, commande.getDeliveryId());
            else
                pst.setNull(8, Types.INTEGER);
            pst.setInt(9, commande.getId());
            pst.executeUpdate();
            System.out.println("Commande updated successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public void delete(int id) {
        String query = "DELETE FROM commande WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            pst.executeUpdate();
            System.out.println("Commande deleted successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public Commande getById(int id) {
        String query = "SELECT * FROM commande WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return new Commande(
                    rs.getInt("id"),
                    rs.getInt("user_id"),
                    rs.getTimestamp("date_creation").toLocalDateTime(),
                    rs.getString("status"),
                    rs.getString("delivery_address"),
                    rs.getString("phone"),
                    rs.getString("payment_method"),
                    rs.getFloat("total_price"),
                    rs.getObject("delivery_id") != null ? rs.getInt("delivery_id") : null
                );
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return null;
    }

    @Override
    public List<Commande> getAll() {
        List<Commande> list = new ArrayList<>();
        String query = "SELECT * FROM commande";
        try (PreparedStatement pst = cnx.prepareStatement(query);
             ResultSet rs = pst.executeQuery()) {
            while (rs.next()) {
                list.add(new Commande(
                    rs.getInt("id"),
                    rs.getInt("user_id"),
                    rs.getTimestamp("date_creation").toLocalDateTime(),
                    rs.getString("status"),
                    rs.getString("delivery_address"),
                    rs.getString("phone"),
                    rs.getString("payment_method"),
                    rs.getFloat("total_price"),
                    rs.getObject("delivery_id") != null ? rs.getInt("delivery_id") : null
                ));
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return list;
    }
}
