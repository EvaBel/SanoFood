package entities;

import java.time.LocalDate;

public class Demande {
    private int id;
    private String nom;
    private String content;
    private LocalDate dateInscription;
    private Integer authorId;
    private String email;
    private String specialite;

    public Demande() {}

    public Demande(int id, String nom, String content, LocalDate dateInscription, Integer authorId,
                   String email, String specialite) {
        this.id = id;
        this.nom = nom;
        this.content = content;
        this.dateInscription = dateInscription;
        this.authorId = authorId;
        this.email = email;
        this.specialite = specialite;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getNom() { return nom; }
    public void setNom(String nom) { this.nom = nom; }

    public String getContent() { return content; }
    public void setContent(String content) { this.content = content; }

    public LocalDate getDateInscription() { return dateInscription; }
    public void setDateInscription(LocalDate dateInscription) { this.dateInscription = dateInscription; }

    public Integer getAuthorId() { return authorId; }
    public void setAuthorId(Integer authorId) { this.authorId = authorId; }

    public String getEmail() { return email; }
    public void setEmail(String email) { this.email = email; }

    public String getSpecialite() { return specialite; }
    public void setSpecialite(String specialite) { this.specialite = specialite; }
}
