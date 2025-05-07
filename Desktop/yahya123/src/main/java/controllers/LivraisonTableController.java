package controllers;

import entities.Livraison;
import javafx.application.Platform;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.geometry.Pos;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.chart.*;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.VBox;
import javafx.stage.FileChooser;
import javafx.stage.Stage;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;
import services.LivraisonService;

import java.io.*;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Comparator;
import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

public class LivraisonTableController {
    @FXML
    private VBox livraisonContainer;
    @FXML private TextField searchField;
    @FXML private ComboBox<String> statutFilter;
    @FXML private TextField commandeIdFilter;
    @FXML private DatePicker minDateFilter;
    @FXML private DatePicker maxDateFilter;
    @FXML private ComboBox<String> sortFilter;
    @FXML private TableView<Livraison> livraisonsTable;
    @FXML private TableColumn<Livraison, Integer> idColumn;
    @FXML private TableColumn<Livraison, Integer> commandeIdColumn;
    @FXML private TableColumn<Livraison, LocalDate> dateLivraisonColumn;
    @FXML private TableColumn<Livraison, String> statutColumn;
    @FXML private TableColumn<Livraison, String> livreurColumn;
    @FXML private TableColumn<Livraison, String> livreurPhoneColumn;
    @FXML private TableColumn<Livraison, String> trackingNumberColumn;
    @FXML private PieChart statutPieChart;
    @FXML private BarChart<String, Number> livreurBarChart;
    @FXML private CategoryAxis livreurXAxis;
    @FXML private NumberAxis livreurYAxis;
    @FXML private BarChart<String, Number> dateBarChart;
    @FXML private CategoryAxis dateXAxis;
    @FXML private NumberAxis dateYAxis;
    @FXML private Button exportCsvButton;

    private LivraisonService livraisonService;
    private ObservableList<Livraison> livraisonsList;
    private ObservableList<String> statuts;
    private ObservableList<String> sortOptions;

    @FXML
    public void initialize() {
        livraisonService = new LivraisonService();
        livraisonsList = FXCollections.observableArrayList();
        statuts = FXCollections.observableArrayList();
        sortOptions = FXCollections.observableArrayList("A-Z", "Z-A", "Date Asc", "Date Desc");

        // Initialize table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("id"));
        commandeIdColumn.setCellValueFactory(new PropertyValueFactory<>("commandeId"));
        dateLivraisonColumn.setCellValueFactory(new PropertyValueFactory<>("dateLivraison"));
        statutColumn.setCellValueFactory(new PropertyValueFactory<>("statut"));
        livreurColumn.setCellValueFactory(new PropertyValueFactory<>("livreur"));
        livreurPhoneColumn.setCellValueFactory(new PropertyValueFactory<>("livreurPhone"));
        trackingNumberColumn.setCellValueFactory(new PropertyValueFactory<>("trackingNumber"));

        // Load data
        loadLivraisons();
        loadFilters();
        loadCharts();

        // Set table and filter data
        livraisonsTable.setItems(livraisonsList);
        statutFilter.setItems(statuts);
        sortFilter.setItems(sortOptions);

        // Add "Tous" option to statut filter
        statuts.add(0, "Tous");

        // Set default sort option
        sortFilter.setValue("A-Z");
    }

    private void loadLivraisons() {
        livraisonsList.clear();
        livraisonsList.addAll(livraisonService.getAll());
    }

    private void loadFilters() {
        statuts.addAll(livraisonService.getAll()
                .stream()
                .map(Livraison::getStatut)
                .distinct()
                .collect(Collectors.toList()));
    }

    private void loadCharts() {
        // Pie Chart: Livraison distribution by statut
        Map<String, Integer> statutCounts = livraisonService.getAll()
                .stream()
                .collect(Collectors.groupingBy(Livraison::getStatut, Collectors.summingInt(l -> 1)));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        statutCounts.forEach((statut, count) ->
                pieChartData.add(new PieChart.Data(statut, count))
        );
        statutPieChart.setData(pieChartData);
        statutPieChart.setTitle("Livraisons par Statut");

        // Bar Chart: Livraisons by livreur
        Map<String, Integer> livreurCounts = livraisonService.getAll()
                .stream()
                .collect(Collectors.groupingBy(Livraison::getLivreur, Collectors.summingInt(l -> 1)));
        XYChart.Series<String, Number> livreurSeries = new XYChart.Series<>();
        livreurSeries.setName("Livraisons");
        livreurCounts.forEach((livreur, count) ->
                livreurSeries.getData().add(new XYChart.Data<>(livreur, count))
        );
        livreurBarChart.getData().add(livreurSeries);
        livreurBarChart.setTitle("Livraisons par Livreur");

        // Bar Chart: Livraisons by date
        Map<String, Integer> dateCounts = livraisonService.getAll()
                .stream()
                .collect(Collectors.groupingBy(
                        l -> l.getDateLivraison().toLocalDate().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(l -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Livraisons");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().add(dateSeries);
        dateBarChart.setTitle("Livraisons par Date");
    }

    @FXML
    private void filterLivraisons() {
        String searchText = searchField.getText().trim().toLowerCase();
        String selectedStatut = statutFilter.getValue() != null ? statutFilter.getValue() : "Tous";
        String commandeIdText = commandeIdFilter.getText().trim();
        String selectedSort = sortFilter.getValue() != null ? sortFilter.getValue() : "A-Z";
        LocalDate minDate = minDateFilter.getValue();
        LocalDate maxDate = maxDateFilter.getValue();

        Integer commandeId = parseInt(commandeIdText, null);

        List<Livraison> filteredList = livraisonService.getAll()
                .stream()
                .filter(l -> l.getLivreur().toLowerCase().contains(searchText) || l.getTrackingNumber().toLowerCase().contains(searchText))
                .filter(l -> selectedStatut.equals("Tous") || l.getStatut().equals(selectedStatut))
                .filter(l -> commandeId == null || l.getCommandeId() == commandeId)
                .filter(l -> minDate == null || !l.getDateLivraison().toLocalDate().isBefore(minDate))
                .filter(l -> maxDate == null || !l.getDateLivraison().toLocalDate().isAfter(maxDate))
                .sorted(getComparator(selectedSort))
                .collect(Collectors.toList());

        livraisonsList.clear();
        livraisonsList.addAll(filteredList);

    }

    @FXML
    private void exportToCSV() {
        if (livraisonsList.isEmpty()) {
            showNotification("❌ Erreur", "Aucune livraison à exporter.", "error");
            return;
        }

        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Enregistrer le CSV");
        fileChooser.getExtensionFilters().add(new FileChooser.ExtensionFilter("Fichiers CSV", "*.csv"));
        fileChooser.setInitialFileName("livraisons_export_" + new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date()) + ".csv");
        File file = fileChooser.showSaveDialog(livraisonsTable.getScene().getWindow());

        if (file == null) {
            return;
        }

        try (BufferedWriter writer = new BufferedWriter(new FileWriter(file))) {
            // Write CSV header
            writer.write("ID,Commande ID,Date Livraison,Statut,Livreur,Téléphone Livreur,Numéro Suivi");
            writer.newLine();

            // Write data
            for (Livraison livraison : livraisonsList) {
                writer.write(String.format("%d,%d,%s,%s,%s,%s,%s",
                        livraison.getId(),
                        livraison.getCommandeId(),
                        livraison.getDateLivraison().toString(),
                        escapeCsv(livraison.getStatut()),
                        escapeCsv(livraison.getLivreur()),
                        escapeCsv(livraison.getLivreurPhone()),
                        escapeCsv(livraison.getTrackingNumber())
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

    private void updateCharts(List<Livraison> filteredList) {
        // Update Pie Chart
        Map<String, Long> statutCounts = filteredList.stream()
                .collect(Collectors.groupingBy(Livraison::getStatut, Collectors.counting()));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        statutCounts.forEach((statut, count) ->
                pieChartData.add(new PieChart.Data(statut, count))
        );
        statutPieChart.setData(pieChartData);

        // Update Bar Chart (Livreur)
        Map<String, Integer> livreurCounts = filteredList.stream()
                .collect(Collectors.groupingBy(Livraison::getLivreur, Collectors.summingInt(l -> 1)));
        XYChart.Series<String, Number> livreurSeries = new XYChart.Series<>();
        livreurSeries.setName("Livraisons");
        livreurCounts.forEach((livreur, count) ->
                livreurSeries.getData().add(new XYChart.Data<>(livreur, count))
        );
        livreurBarChart.getData().clear();
        livreurBarChart.getData().add(livreurSeries);

        // Update Bar Chart (Date)
        Map<String, Integer> dateCounts = filteredList.stream()
                .collect(Collectors.groupingBy(
                        l -> l.getDateLivraison().toLocalDate().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(l -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Livraisons");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().clear();
        dateBarChart.getData().add(dateSeries);
    }

    private Integer parseInt(String text, Integer defaultValue) {
        try {
            return Integer.parseInt(text.trim());
        } catch (NumberFormatException e) {
            return defaultValue;
        }
    }

    private Comparator<Livraison> getComparator(String sortOption) {
        switch (sortOption) {
            case "Z-A":
                return (l1, l2) -> l2.getLivreur().compareToIgnoreCase(l1.getLivreur());
            case "Date Asc":
                return Comparator.comparing(Livraison::getDateLivraison);
            case "Date Desc":
                return (l1, l2) -> l2.getDateLivraison().compareTo(l1.getDateLivraison());
            default:
                return (l1, l2) -> l1.getLivreur().compareToIgnoreCase(l2.getLivreur());
        }
    }
    private void loadScene(String fxmlPath, String title) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();
            Stage stage = (Stage) livraisonContainer.getScene().getWindow();
            stage.setScene(new Scene(root));
            stage.setTitle(title);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    @FXML
    private void navigateToHome() {
        loadScene("/Commande+livraison/LivreurHome.fxml", "Accueil");
    }

    @FXML
    private void navigateToCommandes() {
        loadScene("/Commande+livraison/CommandeClient.fxml", "Commandes");
    }

    @FXML
    private void navigateToProfil() {
        loadScene("/Commande+livraison/LivreurProfil.fxml", "Mon Profil");
    }

    @FXML
    private void navigateToSupport() {
        loadScene("/Commande+livraison/LivreurSupport.fxml", "Support");
    }
}