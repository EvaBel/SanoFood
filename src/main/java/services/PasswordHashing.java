package sanofood.services;
import at.favre.lib.crypto.bcrypt.BCrypt;

public class PasswordHashing {
    public static String doHashing(String password) {
        return BCrypt.withDefaults().hashToString(12, password.toCharArray());
    }

    public static boolean verifyPassword(String password, String hashedPassword) {
        BCrypt.Result result = BCrypt.verifyer().verify(password.toCharArray(), hashedPassword);
        return result.verified;
    }
}