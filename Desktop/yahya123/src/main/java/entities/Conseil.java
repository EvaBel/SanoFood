package entities;

import java.time.LocalDateTime;

public class Conseil {
    private int id;
    private String contenu;
    private LocalDateTime dateConseil;
    private int idDemande;

    public Conseil() {}

    public Conseil(int id, String contenu, LocalDateTime dateConseil, int idDemande) {
        this.id = id;
        this.contenu = contenu;
        this.dateConseil = dateConseil;
        this.idDemande = idDemande;
    }

    // Fixed constructor
    public Conseil(int conseilId, int idDemande, String content, LocalDateTime dateTime) {
        this.id = conseilId;
        this.idDemande = idDemande;
        this.contenu = content;
        this.dateConseil = dateTime;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getContenu() { return contenu; }
    public void setContenu(String contenu) { this.contenu = contenu; }

    public LocalDateTime getDateConseil() { return dateConseil; }
    public void setDateConseil(LocalDateTime dateConseil) { this.dateConseil = dateConseil; }

    public int getIdDemande() { return idDemande; }
    public void setIdDemande(int idDemande) { this.idDemande = idDemande; }
}