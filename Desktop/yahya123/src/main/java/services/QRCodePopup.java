package services;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.WriterException;
import com.google.zxing.qrcode.QRCodeWriter;
import com.google.zxing.client.j2se.MatrixToImageWriter;

import javafx.embed.swing.SwingFXUtils;
import javafx.scene.Scene;
import javafx.scene.image.ImageView;
import javafx.scene.image.WritableImage;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

import java.awt.image.BufferedImage;

import java.awt.image.BufferedImage;

public class QRCodePopup {

    public static void show(String content) {
        try {
            QRCodeWriter writer = new QRCodeWriter();
            BufferedImage bufferedImage = MatrixToImageWriter.toBufferedImage(
                    writer.encode(content, BarcodeFormat.QR_CODE, 250, 250)
            );

            WritableImage fxImage = SwingFXUtils.toFXImage(bufferedImage, null);
            ImageView imageView = new ImageView(fxImage);
            StackPane root = new StackPane(imageView);
            Scene scene = new Scene(root, 270, 270);

            Stage popup = new Stage();
            popup.setTitle("QR Code - Nouvelle Demande");
            popup.setScene(scene);
            popup.show();

        } catch (WriterException e) {
            e.printStackTrace();
        }
    }
}
