package services;

import com.twilio.Twilio;
import com.twilio.rest.api.v2010.account.Message;

public class TwilioService {

    // ✅ Replace with your Twilio credentials
    private static final String ACCOUNT_SID = "ACfae17215ce0743788e78b8aa84644d1d";
    private static final String AUTH_TOKEN = "7ad661b2f9dd61231f90a014be7d35c4";
    private static final String TWILIO_PHONE_NUMBER = "+14705984411";

    public TwilioService() {
        Twilio.init(ACCOUNT_SID, AUTH_TOKEN);
    }

    public void sendSMS(String toPhoneNumber, String messageText) {
        try {
            Message message = Message.creator(
                    new com.twilio.type.PhoneNumber(toPhoneNumber),
                    new com.twilio.type.PhoneNumber(TWILIO_PHONE_NUMBER),
                    messageText
            ).create();

            System.out.println("✅ SMS sent successfully! SID: " + message.getSid());
        } catch (Exception e) {
            System.out.println("❌ Error sending SMS: " + e.getMessage());
        }
    }
}