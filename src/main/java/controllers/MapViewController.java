package controllers;

import javafx.concurrent.Worker;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.input.MouseEvent;
import javafx.scene.web.WebView;
import javafx.stage.Stage;

import java.util.List;
import java.util.stream.Collectors;

public class MapViewController {

    @FXML private WebView mapWebView;
    @FXML private Button closeBtn;

    private List<String> addresses;

    @FXML
    public void initialize() {
        // Load the map HTML content using string concatenation instead of text block
        String mapHtml = "<!DOCTYPE html>\n" +
                "<html>\n" +
                "<head>\n" +
                "    <title>Map of Delivery Addresses</title>\n" +
                "    <meta charset=\"utf-8\" />\n" +
                "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n" +
                "    <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.9.3/dist/leaflet.css\" />\n" +
                "    <script src=\"https://unpkg.com/leaflet@1.9.3/dist/leaflet.js\"></script>\n" +
                "    <style>\n" +
                "        #map { height: 540px; width: 100%; }\n" +
                "    </style>\n" +
                "</head>\n" +
                "<body>\n" +
                "    <div id=\"map\"></div>\n" +
                "    <script>\n" +
                "        var map = L.map('map').setView([36.8065, 10.1815], 10);\n" +
                "        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {\n" +
                "            attribution: '© <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'\n" +
                "        }).addTo(map);\n" +
                "\n" +
                "        function displayAddresses(addresses) {\n" +
                "            var bounds = L.latLngBounds();\n" +
                "            addresses.forEach(function(address) {\n" +
                "                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)\n" +
                "                    .then(response => response.json())\n" +
                "                    .then(data => {\n" +
                "                        if (data && data.length > 0) {\n" +
                "                            var lat = parseFloat(data[0].lat);\n" +
                "                            var lon = parseFloat(data[0].lon);\n" +
                "                            var marker = L.marker([lat, lon])\n" +
                "                                .addTo(map)\n" +
                "                                .bindPopup(address);\n" +
                "                            bounds.extend([lat, lon]);\n" +
                "                            if (bounds.isValid()) {\n" +
                "                                map.fitBounds(bounds);\n" +
                "                            }\n" +
                "                        } else {\n" +
                "                            console.warn(`No coordinates found for address: ${address}`);\n" +
                "                        }\n" +
                "                    })\n" +
                "                    .catch(error => {\n" +
                "                        console.error(`Error geocoding address ${address}:`, error);\n" +
                "                    });\n" +
                "            });\n" +
                "        }\n" +
                "    </script>\n" +
                "</body>\n" +
                "</html>";

        mapWebView.getEngine().loadContent(mapHtml);

        // Load addresses after the WebView is ready
        mapWebView.getEngine().getLoadWorker().stateProperty().addListener((obs, oldState, newState) -> {
            if (newState == Worker.State.SUCCEEDED && addresses != null) {
                // Convert addresses to JSON string
                String addressesJson = "[" + addresses.stream()
                        .map(addr -> "\"" + addr.replace("\"", "\\\"") + "\"")
                        .collect(Collectors.joining(",")) + "]";

                // Execute JavaScript to display addresses
                mapWebView.getEngine().executeScript("displayAddresses(" + addressesJson + ");");
            }
        });
    }

    public void setAddresses(List<String> addresses) {
        this.addresses = addresses;
        // If WebView is already loaded, display addresses immediately
        if (mapWebView.getEngine().getLoadWorker().getState() == Worker.State.SUCCEEDED) {
            String addressesJson = "[" + addresses.stream()
                    .map(addr -> "\"" + addr.replace("\"", "\\\"") + "\"")
                    .collect(Collectors.joining(",")) + "]";
            mapWebView.getEngine().executeScript("displayAddresses(" + addressesJson + ");");
        }
    }

    @FXML
    private void close() {
        Stage stage = (Stage) closeBtn.getScene().getWindow();
        stage.close();
    }

    @FXML
    private void handleCloseBtnHover(MouseEvent event) {
        closeBtn.setStyle("-fx-background-color: #c0392b; -fx-text-fill: white; -fx-font-weight: bold; -fx-background-radius: 4; -fx-padding: 8 15;");
    }

    @FXML
    private void handleCloseBtnUnhover(MouseEvent event) {
        closeBtn.setStyle("-fx-background-color: #e74c3c; -fx-text-fill: white; -fx-font-weight: bold; -fx-background-radius: 4; -fx-padding: 8 15;");
    }
}