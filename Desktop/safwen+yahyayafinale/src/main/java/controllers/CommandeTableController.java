package controllers;

import entities.Commande;
import javafx.application.Platform;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.chart.*;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;
import services.CommandeService;

import java.io.*;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Comparator;
import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

public class CommandeTableController {

    @FXML private TextField searchField;
    @FXML private ComboBox<String> statusFilter;
    @FXML private ComboBox<String> paymentMethodFilter;
    @FXML private DatePicker minDateFilter;
    @FXML private DatePicker maxDateFilter;
    @FXML private TextField minPriceFilter;
    @FXML private TextField maxPriceFilter;
    @FXML private ComboBox<String> sortFilter;
    @FXML private TableView<Commande> commandesTable;
    @FXML private TableColumn<Commande, Integer> idColumn;
    @FXML private TableColumn<Commande, Integer> userIdColumn;
    @FXML private TableColumn<Commande, LocalDate> dateCreationColumn;
    @FXML private TableColumn<Commande, String> statusColumn;
    @FXML private TableColumn<Commande, String> deliveryAddressColumn;
    @FXML private TableColumn<Commande, String> phoneColumn;
    @FXML private TableColumn<Commande, String> paymentMethodColumn;
    @FXML private TableColumn<Commande, Float> totalPriceColumn;
    @FXML private TableColumn<Commande, Integer> deliveryIdColumn;
    @FXML private PieChart statusPieChart;
    @FXML private BarChart<String, Number> dateBarChart;
    @FXML private CategoryAxis dateXAxis;
    @FXML private NumberAxis dateYAxis;
    @FXML private BarChart<String, Number> totalPriceBarChart;
    @FXML private CategoryAxis priceXAxis;
    @FXML private NumberAxis priceYAxis;
    @FXML private Button exportCsvButton;

    private CommandeService commandeService;
    private ObservableList<Commande> commandesList;
    private ObservableList<String> statuses;
    private ObservableList<String> paymentMethods;
    private ObservableList<String> sortOptions;

    @FXML
    public void initialize() {
        commandeService = new CommandeService();
        commandesList = FXCollections.observableArrayList();
        statuses = FXCollections.observableArrayList();
        paymentMethods = FXCollections.observableArrayList();
        sortOptions = FXCollections.observableArrayList("A-Z", "Z-A", "Date Asc", "Date Desc", "Price Asc", "Price Desc");

        // Initialize table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("id"));
        userIdColumn.setCellValueFactory(new PropertyValueFactory<>("userId"));
        dateCreationColumn.setCellValueFactory(new PropertyValueFactory<>("dateCreation"));
        statusColumn.setCellValueFactory(new PropertyValueFactory<>("status"));
        deliveryAddressColumn.setCellValueFactory(new PropertyValueFactory<>("deliveryAddress"));
        phoneColumn.setCellValueFactory(new PropertyValueFactory<>("phone"));
        paymentMethodColumn.setCellValueFactory(new PropertyValueFactory<>("paymentMethod"));
        totalPriceColumn.setCellValueFactory(new PropertyValueFactory<>("totalPrice"));
        deliveryIdColumn.setCellValueFactory(new PropertyValueFactory<>("deliveryId"));

        // Load data
        loadCommandes();
        loadFilters();
        loadCharts();

        // Set table and filter data
        commandesTable.setItems(commandesList);
        statusFilter.setItems(statuses);
        paymentMethodFilter.setItems(paymentMethods);
        sortFilter.setItems(sortOptions);

        // Add "Tous" option to filters
        statuses.add(0, "Tous");
        paymentMethods.add(0, "Tous");

        // Set default sort option
        sortFilter.setValue("A-Z");
    }

    private void loadCommandes() {
        commandesList.clear();
        commandesList.addAll(commandeService.getAll());
    }

    private void loadFilters() {
        statuses.addAll(commandeService.getAll()
                .stream()
                .map(Commande::getStatus)
                .distinct()
                .collect(Collectors.toList()));
        paymentMethods.addAll(commandeService.getAll()
                .stream()
                .map(Commande::getPaymentMethod)
                .distinct()
                .collect(Collectors.toList()));
    }

    private void loadCharts() {
        // Pie Chart: Commande distribution by status
        Map<String, Integer> statusCounts = commandeService.getAll()
                .stream()
                .collect(Collectors.groupingBy(Commande::getStatus, Collectors.summingInt(c -> 1)));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        statusCounts.forEach((status, count) ->
                pieChartData.add(new PieChart.Data(status, count))
        );
        statusPieChart.setData(pieChartData);
        statusPieChart.setTitle("Commandes par Statut");

        // Bar Chart: Commandes by date
        Map<String, Integer> dateCounts = commandeService.getAll()
                .stream()
                .collect(Collectors.groupingBy(
                        c -> c.getDateCreation().toLocalDate().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(c -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Commandes");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().add(dateSeries);
        dateBarChart.setTitle("Commandes par Date");

        // Bar Chart: Total price by status
        Map<String, Double> totalPriceByStatus = commandeService.getAll()
                .stream()
                .collect(Collectors.groupingBy(
                        Commande::getStatus,
                        Collectors.summingDouble(Commande::getTotalPrice)
                ));
        XYChart.Series<String, Number> priceSeries = new XYChart.Series<>();
        priceSeries.setName("Montant Total");
        totalPriceByStatus.forEach((status, total) ->
                priceSeries.getData().add(new XYChart.Data<>(status, total))
        );
        totalPriceBarChart.getData().add(priceSeries);
        totalPriceBarChart.setTitle("Montant Total par Statut");
    }

    @FXML
    private void filterCommandes() {
        String searchText = searchField.getText().trim().toLowerCase();
        String selectedStatus = statusFilter.getValue() != null ? statusFilter.getValue() : "Tous";
        String selectedPaymentMethod = paymentMethodFilter.getValue() != null ? paymentMethodFilter.getValue() : "Tous";
        String selectedSort = sortFilter.getValue() != null ? sortFilter.getValue() : "A-Z";
        LocalDate minDate = minDateFilter.getValue();
        LocalDate maxDate = maxDateFilter.getValue();
        float minPrice = parseFloat(minPriceFilter.getText(), 0.0f);
        float maxPrice = parseFloat(maxPriceFilter.getText(), Float.MAX_VALUE);

        List<Commande> filteredList = commandeService.getAll()
                .stream()
                .filter(c -> c.getDeliveryAddress().toLowerCase().contains(searchText) || c.getPhone().toLowerCase().contains(searchText))
                .filter(c -> selectedStatus.equals("Tous") || c.getStatus().equals(selectedStatus))
                .filter(c -> selectedPaymentMethod.equals("Tous") || c.getPaymentMethod().equals(selectedPaymentMethod))
                .filter(c -> minDate == null || !c.getDateCreation().toLocalDate().isBefore(minDate))
                .filter(c -> maxDate == null || !c.getDateCreation().toLocalDate().isAfter(maxDate))
                .filter(c -> c.getTotalPrice() >= minPrice && c.getTotalPrice() <= maxPrice)
                .sorted(getComparator(selectedSort))
                .collect(Collectors.toList());

        commandesList.clear();
        commandesList.addAll(filteredList);

        // Update charts based on filtered data
        updateCharts(filteredList);
    }

    @FXML
    private void exportToCSV() {
        if (commandesList.isEmpty()) {
            showNotification("❌ Erreur", "Aucune commande à exporter.", "error");
            return;
        }

        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Enregistrer le CSV");
        fileChooser.getExtensionFilters().add(new FileChooser.ExtensionFilter("Fichiers CSV", "*.csv"));
        fileChooser.setInitialFileName("commandes_export_" + new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date()) + ".csv");
        File file = fileChooser.showSaveDialog(commandesTable.getScene().getWindow());

        if (file == null) {
            return;
        }

        try (BufferedWriter writer = new BufferedWriter(new FileWriter(file))) {
            // Write CSV header
            writer.write("ID,User ID,Date Création,Statut,Adresse Livraison,Téléphone,Méthode Paiement,Prix Total,Livraison ID");
            writer.newLine();

            // Write data
            for (Commande commande : commandesList) {
                writer.write(String.format("%d,%d,%s,%s,%s,%s,%s,%.2f,%s",
                        commande.getId(),
                        commande.getUserId(),
                        commande.getDateCreation().toString(),
                        escapeCsv(commande.getStatus()),
                        escapeCsv(commande.getDeliveryAddress()),
                        escapeCsv(commande.getPhone()),
                        escapeCsv(commande.getPaymentMethod()),
                        commande.getTotalPrice(),
                        commande.getDeliveryId() != null ? commande.getDeliveryId().toString() : ""
                ));
                writer.newLine();
            }

            showNotification("✅ Succès", "CSV exporté avec succès : " + file.getAbsolutePath(), "success");
        } catch (IOException e) {
            System.err.println("Error exporting CSV: " + e.getMessage());
            showNotification("❌ Erreur", "Échec de l'exportation du CSV : " + e.getMessage(), "error");
        }
    }

    private String escapeCsv(String value) {
        if (value == null) {
            return "";
        }
        if (value.contains(",") || value.contains("\"") || value.contains("\n")) {
            return "\"" + value.replace("\"", "\"\"") + "\"";
        }
        return value;
    }

    private void showNotification(String title, String message, String type) {
        Notifications notification = Notifications.create()
                .title(title)
                .text(message)
                .position(Pos.TOP_RIGHT)
                .hideAfter(Duration.seconds(4));
        Platform.runLater(() -> {
            if (type.equals("success")) {
                notification.showInformation();
            } else {
                notification.showError();
            }
        });
    }

    private void updateCharts(List<Commande> filteredList) {
        // Update Pie Chart
        Map<String, Long> statusCounts = filteredList.stream()
                .collect(Collectors.groupingBy(Commande::getStatus, Collectors.counting()));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        statusCounts.forEach((status, count) ->
                pieChartData.add(new PieChart.Data(status, count))
        );
        statusPieChart.setData(pieChartData);

        // Update Bar Chart (Date)
        Map<String, Integer> dateCounts = filteredList.stream()
                .collect(Collectors.groupingBy(
                        c -> c.getDateCreation().toLocalDate().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(c -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Commandes");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().clear();
        dateBarChart.getData().add(dateSeries);

        // Update Bar Chart (Total Price)
        Map<String, Double> totalPriceByStatus = filteredList.stream()
                .collect(Collectors.groupingBy(
                        Commande::getStatus,
                        Collectors.summingDouble(Commande::getTotalPrice)
                ));
        XYChart.Series<String, Number> priceSeries = new XYChart.Series<>();
        priceSeries.setName("Montant Total");
        totalPriceByStatus.forEach((status, total) ->
                priceSeries.getData().add(new XYChart.Data<>(status, total))
        );
        totalPriceBarChart.getData().clear();
        totalPriceBarChart.getData().add(priceSeries);
    }

    private float parseFloat(String text, float defaultValue) {
        try {
            return Float.parseFloat(text.trim());
        } catch (NumberFormatException e) {
            return defaultValue;
        }
    }

    private Comparator<Commande> getComparator(String sortOption) {
        switch (sortOption) {
            case "Z-A":
                return (c1, c2) -> c2.getDeliveryAddress().compareToIgnoreCase(c1.getDeliveryAddress());
            case "Date Asc":
                return Comparator.comparing(Commande::getDateCreation);
            case "Date Desc":
                return (c1, c2) -> c2.getDateCreation().compareTo(c1.getDateCreation());
            case "Price Asc":
                return Comparator.comparing(Commande::getTotalPrice);
            case "Price Desc":
                return (c1, c2) -> Float.compare(c2.getTotalPrice(), c1.getTotalPrice());
            default:
                return (c1, c2) -> c1.getDeliveryAddress().compareToIgnoreCase(c2.getDeliveryAddress());
        }
    }

    @FXML
    public void showAddressesOnMap(ActionEvent actionEvent) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/Commande+livraison/MapView.fxml")); // Adjust path as needed
            Parent root = loader.load();
            MapViewController controller = loader.getController();
            List<String> deliveryAddresses = commandesList.stream()
                    .map(Commande::getDeliveryAddress)
                    .distinct()
                    .collect(Collectors.toList());
            controller.setAddresses(deliveryAddresses);
            Stage stage = new Stage();
            stage.setTitle("Delivery Addresses Map");
            stage.setScene(new Scene(root));
            stage.show();
        } catch (IOException e) {
            System.err.println("Error loading Map: " + e.getMessage());
            showNotification("❌ Erreur", "Échec du chargement de la carte : " + e.getMessage(), "error");
        }
    }
}