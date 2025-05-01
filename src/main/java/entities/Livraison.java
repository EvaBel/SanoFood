package entities;

import java.time.LocalDateTime;

public class Livraison {
    private int id;
    private int commandeId;
    private LocalDateTime dateLivraison;
    private String statut;
    private String livreur;
    private String livreurPhone;
    private String trackingNumber;

    public Livraison() {}

    public Livraison(int id, int commandeId, LocalDateTime dateLivraison, String statut,
                     String livreur, String livreurPhone, String trackingNumber) {
        this.id = id;
        this.commandeId = commandeId;
        this.dateLivraison = dateLivraison;
        this.statut = statut;
        this.livreur = livreur;
        this.livreurPhone = livreurPhone;
        this.trackingNumber = trackingNumber;
    }

    public Livraison(int commandeId, LocalDateTime now, String enCours, String livreur, String phone, String tracking) {
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public int getCommandeId() { return commandeId; }
    public void setCommandeId(int commandeId) { this.commandeId = commandeId; }

    public LocalDateTime getDateLivraison() { return dateLivraison; }
    public void setDateLivraison(LocalDateTime dateLivraison) { this.dateLivraison = dateLivraison; }

    public String getStatut() { return statut; }
    public void setStatut(String statut) { this.statut = statut; }

    public String getLivreur() { return livreur; }
    public void setLivre(String livreur) { this.livreur = livreur; }

    public String getLivreurPhone() { return livreurPhone; }
    public void setLivreurPhone(String livreurPhone) { this.livreurPhone = livreurPhone; }

    public String getTrackingNumber() { return trackingNumber; }
    public void setTrackingNumber(String trackingNumber) { this.trackingNumber = trackingNumber; }
}
