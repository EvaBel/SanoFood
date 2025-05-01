package services;

import entities.Conseil;
import utilities.Myconnection;

import java.sql.*;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.List;

public class ConseilService implements CrudInterface<Conseil> {
    private Connection cnx;

    public ConseilService() {
        cnx = Myconnection.getInstance().getCnx();
    }

    @Override
    public void create(Conseil conseil) {
        String query = "INSERT INTO conseil (contenu, date_conseil, id_demande) VALUES (?, ?, ?)";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setString(1, conseil.getContenu());
            pst.setTimestamp(2, Timestamp.valueOf(conseil.getDateConseil()));
            pst.setInt(3, conseil.getIdDemande());
            pst.executeUpdate();
            System.out.println("Conseil added successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public void update(Conseil conseil) {
        String query = "UPDATE conseil SET contenu=?, date_conseil=?, id_demande=? WHERE id_c=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setString(1, conseil.getContenu());
            pst.setTimestamp(2, Timestamp.valueOf(conseil.getDateConseil()));
            pst.setInt(3, conseil.getIdDemande());
            pst.setInt(4, conseil.getId());
            pst.executeUpdate();
            System.out.println("Conseil updated successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public void delete(int id) {
        String query = "DELETE FROM conseil WHERE id_c=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            pst.executeUpdate();
            System.out.println("Conseil deleted successfully");
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
    }

    @Override
    public Conseil getById(int id) {
        String query = "SELECT * FROM conseil WHERE id_c=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, id);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return new Conseil(
                        rs.getInt("id_c"),
                        rs.getString("contenu"),
                        rs.getTimestamp("date_conseil").toLocalDateTime(),
                        rs.getInt("id_demande")
                );
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return null;
    }

    @Override
    public List<Conseil> getAll() {
        List<Conseil> list = new ArrayList<>();
        String query = "SELECT * FROM conseil";
        try (PreparedStatement pst = cnx.prepareStatement(query);
             ResultSet rs = pst.executeQuery()) {
            while (rs.next()) {
                list.add(new Conseil(
                        rs.getInt("id_c"),
                        rs.getString("contenu"),
                        rs.getTimestamp("date_conseil").toLocalDateTime(),
                        rs.getInt("id_demande")
                ));
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return list;
    }

    public boolean existsDemandeId(int demandeId) {
        String query = "SELECT 1 FROM demande WHERE id_demande=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, demandeId);
            ResultSet rs = pst.executeQuery();
            return rs.next();
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
            return false;
        }
    }

    public Conseil findByDemandeIdAndContent(int demandeId, String content) {
        String query = "SELECT * FROM conseil WHERE id_demande=? AND contenu=?";
        try (PreparedStatement pst = cnx.prepareStatement(query)) {
            pst.setInt(1, demandeId);
            pst.setString(2, content);
            ResultSet rs = pst.executeQuery();
            if (rs.next()) {
                return new Conseil(
                        rs.getInt("id_c"),
                        rs.getString("contenu"),
                        rs.getTimestamp("date_conseil").toLocalDateTime(),
                        rs.getInt("id_demande")
                );
            }
        } catch (SQLException ex) {
            System.err.println(ex.getMessage());
        }
        return null;
    }
}