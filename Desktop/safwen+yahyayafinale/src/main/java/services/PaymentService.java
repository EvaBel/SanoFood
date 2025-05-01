package services;

import com.stripe.Stripe;
import com.stripe.exception.StripeException;
import com.stripe.model.checkout.Session;
import com.stripe.param.checkout.SessionCreateParams;
import entities.Commande;

public class PaymentService {

    static {
        // Initialize Stripe API key (replace with your Stripe Secret Key)
        Stripe.apiKey = "sk_test_51QCAHpBDW3LkkcbKFv9eNqLWddEC9JLkjAoZkB6VC6e52cHjojXS5vlEoWlZQWCeeAaN67bpZllUrR9RWehULuup00lCYHx3bX";
    }

    public String createCheckoutSession(Commande commande) throws StripeException {
        // Convert TND to USD (example exchange rate: 1 TND = 0.32 USD)
        double exchangeRate = 0.32; // Replace with a dynamic rate from an API if needed
        double amountInUSD = commande.getTotalPrice() * exchangeRate;
        long amountInCents = (long) (amountInUSD * 100); // Convert USD to cents

        SessionCreateParams params = SessionCreateParams.builder()
                .setMode(SessionCreateParams.Mode.PAYMENT)
                .setSuccessUrl("https://yourdomain.com/success?session_id={CHECKOUT_SESSION_ID}")
                .setCancelUrl("https://yourdomain.com/cancel")
                .setCurrency("usd") // Use USD since TND is not supported
                .addLineItem(
                        SessionCreateParams.LineItem.builder()
                                .setQuantity(1L)
                                .setPriceData(
                                        SessionCreateParams.LineItem.PriceData.builder()
                                                .setCurrency("usd")
                                                .setUnitAmount(amountInCents)
                                                .setProductData(
                                                        SessionCreateParams.LineItem.PriceData.ProductData.builder()
                                                                .setName("Commande #" + commande.getId())
                                                                .build()
                                                )
                                                .build()
                                )
                                .build()
                )
                .build();

        Session session = Session.create(params);
        return session.getUrl(); // Return the Stripe checkout URL
    }
}