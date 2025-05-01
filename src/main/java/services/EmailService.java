package services;

import entities.Commande;
import entities.Livraison;
import jakarta.mail.*;
import jakarta.mail.internet.InternetAddress;
import jakarta.mail.internet.MimeMessage;

import java.util.Properties;

public class EmailService {

    private static final String USERNAME = "hassanjebri99@gmail.com";
    private static final String PASSWORD = "tmeufaupewnuuzdg";

    private static void sendEmail(String recipient, String subject, String content) {
        Properties properties = new Properties();
        properties.put("mail.smtp.auth", "true");
        properties.put("mail.smtp.starttls.enable", "true");
        properties.put("mail.smtp.host", "smtp.gmail.com");
        properties.put("mail.smtp.port", "587");

        Session session = Session.getInstance(properties, new Authenticator() {
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(USERNAME, PASSWORD);
            }
        });

        try {
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(USERNAME));
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(recipient));
            message.setSubject(subject);
            message.setContent(content, "text/html");

            Transport.send(message);
            System.out.println("✅ Email envoyé à " + recipient);
        } catch (MessagingException e) {
            e.printStackTrace();
            System.err.println("❌ Échec de l'envoi de l'email: " + e.getMessage());
        }
    }

    public static void sendLivraisonConfirmation(String recipient, String userName, Commande commande, Livraison livraison) {
        String subject = "Confirmation de Livraison pour Commande #" + commande.getId();
        StringBuilder emailContent = new StringBuilder();
        emailContent.append("<html><body>")
                .append("<h2 style='color: blue;'>Bonjour ").append(userName).append(",</h2>")
                .append("<p>La livraison pour votre commande a été enregistrée avec succès !</p>")
                .append("<p><strong>Commande #").append(commande.getId()).append("</strong></p>")
                .append("<p><strong>Date de commande :</strong> ").append(commande.getDateCreation()).append("</p>")
                .append("<p><strong>Adresse de livraison :</strong> ").append(commande.getDeliveryAddress()).append("</p>")
                .append("<p><strong>Méthode de paiement :</strong> ").append(commande.getPaymentMethod()).append("</p>")
                .append("<p><strong>Montant total :</strong> ").append(String.format("%.2f TND", commande.getTotalPrice())).append("</p>")
                .append("<h3>Détails de la livraison :</h3>")
                .append("<ul>")
                .append("<li><strong>Livreur :</strong> ").append(livraison.getLivreur()).append("</li>")
                .append("<li><strong>Téléphone du livreur :</strong> ").append(livraison.getLivreurPhone()).append("</li>")
                .append("<li><strong>Numéro de suivi :</strong> ").append(livraison.getTrackingNumber()).append("</li>")
                .append("<li><strong>Statut :</strong> ").append(livraison.getStatut()).append("</li>")
                .append("<li><strong>Date de création :</strong> ").append(livraison.getDateLivraison()).append("</li>")
                .append("</ul>")
                .append("<p>Merci pour votre confiance ! 😊</p>")
                .append("<p>Pour toute question, contactez-nous à support@votreplateforme.com.</p>")
                .append("<hr>")
                .append("<p style='color:gray; font-size:12px;'>Ceci est un email automatique, veuillez ne pas répondre.</p>")
                .append("</body></html>");

        sendEmail(recipient, subject, emailContent.toString());
    }
}