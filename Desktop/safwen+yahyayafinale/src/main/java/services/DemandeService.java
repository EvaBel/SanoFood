
package services;

import entities.Demande;
import utilities.Myconnection;

import java.sql.*;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;

public class DemandeService implements CrudInterface<Demande> {
    private Connection cnx;

    public DemandeService() {
        cnx = Myconnection.getInstance().getCnx();
    }

    @Override
    public void create(Demande demande) {
        String query = "INSERT INTO demande (nom, content, date_Inscription, author_id, email, specialite) VALUES (?, ?, ?, ?, ?, ?)";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setString(1, demande.getNom());
            pst.setString(2, demande.getContent());
            pst.setDate(3, Date.valueOf(demande.getDateInscription()));
            if (demande.getAuthorId() != null)
                pst.setInt(4, demande.getAuthorId());
            else
                pst.setNull(4, Types.INTEGER);
            pst.setString(5, demande.getEmail());
            pst.setString(6, demande.getSpecialite());
            pst.executeUpdate();
            System.out.println("Demande added successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public void update(Demande demande) {
        String query = "UPDATE demande SET nom=?, content=?, date_Inscription=?, author_id=?, email=?, specialite=? WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setString(1, demande.getNom());
            pst.setString(2, demande.getContent());
            pst.setDate(3, Date.valueOf(demande.getDateInscription()));
            if (demande.getAuthorId() != null)
                pst.setInt(4, demande.getAuthorId());
            else
                pst.setNull(4, Types.INTEGER);
            pst.setString(5, demande.getEmail());
            pst.setString(6, demande.getSpecialite());
            pst.setInt(7, demande.getId());
            pst.executeUpdate();
            System.out.println("Demande updated successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public void delete(int id) {
        String query = "DELETE FROM demande WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            pst.executeUpdate();
            System.out.println("Demande deleted successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public Demande getById(int id) {
        String query = "SELECT * FROM demande WHERE id=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return new Demande(
                    rs.getInt("id"),
                    rs.getString("nom"),
                    rs.getString("content"),
                    rs.getDate("date_Inscription").toLocalDate(),
                    rs.getObject("author_id") != null ? rs.getInt("author_id") : null,
                    rs.getString("email"),
                    rs.getString("specialite")
                );
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return null;
    }

    @Override
    public List<Demande> getAll() {
        List<Demande> list = new ArrayList<>();
        String query = "SELECT * FROM demande";
        try (PreparedStatement pst = cnx.prepareStatement(query);
             ResultSet rs = pst.executeQuery()) {
            while (rs.next()) {
                list.add(new Demande(
                    rs.getInt("id"),
                    rs.getString("nom"),
                    rs.getString("content"),
                    rs.getDate("date_Inscription").toLocalDate(),
                    rs.getObject("author_id") != null ? rs.getInt("author_id") : null,
                    rs.getString("email"),
                    rs.getString("specialite")
                ));
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return list;
    }
}
