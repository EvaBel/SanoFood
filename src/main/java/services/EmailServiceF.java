package sanofood.services;

import jakarta.mail.*;
import jakarta.mail.internet.InternetAddress;
import jakarta.mail.internet.MimeMessage;
import java.util.Properties;

public class EmailServiceF {
    private final String username = "pidev232@gmail.com";
    private final String password = "xjab bktt efrm hwsq";
//    public void sendEmail(String toEmail, String subject, String body) {
//        Properties props = new Properties();
//        props.put("mail.smtp.auth", "true");
//        props.put("mail.smtp.starttls.enable", "true");
//        props.put("mail.smtp.host", "smtp.gmail.com");
//        props.put("mail.smtp.port", "587");
//        props.put("mail.smtp.ssl.protocols", "TLSv1.2");
//
//        Session session = Session.getInstance(props, new Authenticator() {
//            @Override
//            protected PasswordAuthentication getPasswordAuthentication() {
//                return new PasswordAuthentication(username, password);
//            }
//        });
//
//        try {
//            Message message = new MimeMessage(session);
//            message.setFrom(new InternetAddress(username));
//            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(toEmail));
//            message.setSubject(subject);
//            message.setText(body);
//
//            Transport.send(message);
//        } catch (MessagingException e) {
//            throw new RuntimeException("Failed to send email: " + e.getMessage(), e);
//        }
//    }
public boolean sendEmail(String toEmail, String subject, String body) {
    Properties props = new Properties();
    props.put("mail.smtp.auth", "true");
    props.put("mail.smtp.ssl.enable", "true");  // Use SSL (not STARTTLS) for port 465
    props.put("mail.smtp.host", "smtp.gmail.com");
    props.put("mail.smtp.port", "465");

    // Timeout settings
    props.put("mail.smtp.connectiontimeout", "5000");
    props.put("mail.smtp.timeout", "5000");
    props.put("mail.smtp.writetimeout", "5000");
    // Enable debugging
    props.put("mail.debug", "true");

    Session session = Session.getInstance(props, new Authenticator() {
        @Override
        protected PasswordAuthentication getPasswordAuthentication() {
            return new PasswordAuthentication(username, password);
        }
    });

    try {
        Message message = new MimeMessage(session);
        message.setFrom(new InternetAddress(username));
        message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(toEmail));
        message.setSubject(subject);
        message.setText(body);

        Transport.send(message);
        System.out.println("Email sent successfully to: " + toEmail);
        return true;
    } catch (MessagingException e) {
        System.err.println("Failed to send email: " + e.getMessage());
        e.printStackTrace();
        return false;
    }
}
    public void sendVerificationCode(String toEmail, String verificationCode) {
        String subject = "Your Verification Code";
        String body = "Your verification code is: " + verificationCode;
        sendEmail(toEmail, subject, body);
    }
}