package controllers;

import com.itextpdf.text.*;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;
import entities.Conseil;
import javafx.application.Platform;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.chart.*;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.FileChooser;
import javafx.util.Duration;
import org.controlsfx.control.Notifications;
import services.ConseilService;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Comparator;
import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

public class ConseilTableController {

    @FXML private TextField searchField;
    @FXML private TextField demandeIdFilter;
    @FXML private DatePicker minDateFilter;
    @FXML private DatePicker maxDateFilter;
    @FXML private ComboBox<String> sortFilter;
    @FXML private TableView<Conseil> conseilsTable;
    @FXML private TableColumn<Conseil, Integer> idColumn;
    @FXML private TableColumn<Conseil, String> contenuColumn;
    @FXML private TableColumn<Conseil, LocalDateTime> dateConseilColumn;
    @FXML private TableColumn<Conseil, Integer> idDemandeColumn;
    @FXML private PieChart demandePieChart;
    @FXML private BarChart<String, Number> dateBarChart;
    @FXML private CategoryAxis dateXAxis;
    @FXML private NumberAxis dateYAxis;
    @FXML private Button exportPdfButton;

    private ConseilService conseilService;
    private ObservableList<Conseil> conseilsList;
    private ObservableList<String> sortOptions;

    @FXML
    public void initialize() {
        conseilService = new ConseilService();
        conseilsList = FXCollections.observableArrayList();
        sortOptions = FXCollections.observableArrayList("A-Z", "Z-A", "Date Asc", "Date Desc");

        // Initialize table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("id"));
        contenuColumn.setCellValueFactory(new PropertyValueFactory<>("contenu"));
        dateConseilColumn.setCellValueFactory(new PropertyValueFactory<>("dateConseil"));
        idDemandeColumn.setCellValueFactory(new PropertyValueFactory<>("idDemande"));

        // Load data
        loadConseils();
        loadCharts();

        // Set table and filter data
        conseilsTable.setItems(conseilsList);
        sortFilter.setItems(sortOptions);

        // Set default sort option
        sortFilter.setValue("A-Z");
    }

    private void loadConseils() {
        conseilsList.clear();
        conseilsList.addAll(conseilService.getAll());
    }

    private void loadCharts() {
        // Pie Chart: Conseil distribution by demande ID
        Map<Integer, Integer> demandeCounts = conseilService.getAll()
                .stream()
                .collect(Collectors.groupingBy(Conseil::getIdDemande, Collectors.summingInt(c -> 1)));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        demandeCounts.forEach((demandeId, count) ->
                pieChartData.add(new PieChart.Data("Demande " + demandeId, count))
        );
        demandePieChart.setData(pieChartData);
        demandePieChart.setTitle("Conseils par Demande");

        // Bar Chart: Conseils by date
        Map<String, Integer> dateCounts = conseilService.getAll()
                .stream()
                .collect(Collectors.groupingBy(
                        c -> c.getDateConseil().toLocalDate().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(c -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Conseils");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().add(dateSeries);
        dateBarChart.setTitle("Conseils par Date");
    }

    @FXML
    private void filterConseils() {
        String searchText = searchField.getText().trim().toLowerCase();
        String demandeIdText = demandeIdFilter.getText().trim();
        String selectedSort = sortFilter.getValue() != null ? sortFilter.getValue() : "A-Z";
        LocalDate minDate = minDateFilter.getValue();
        LocalDate maxDate = maxDateFilter.getValue();

        Integer demandeId = parseInt(demandeIdText, null);

        List<Conseil> filteredList = conseilService.getAll()
                .stream()
                .filter(c -> c.getContenu().toLowerCase().contains(searchText))
                .filter(c -> demandeId == null || c.getIdDemande() == demandeId)
                .filter(c -> minDate == null || !c.getDateConseil().toLocalDate().isBefore(minDate))
                .filter(c -> maxDate == null || !c.getDateConseil().toLocalDate().isAfter(maxDate))
                .sorted(getComparator(selectedSort))
                .collect(Collectors.toList());

        conseilsList.clear();
        conseilsList.addAll(filteredList);

        // Update charts based on filtered data
        updateCharts(filteredList);
    }

    @FXML
    private void exportToPDF() {
        if (conseilsList.isEmpty()) {
            showNotification("❌ Erreur", "Aucun conseil à exporter.", "error");
            return;
        }

        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Enregistrer le PDF");
        fileChooser.getExtensionFilters().add(new FileChooser.ExtensionFilter("Fichiers PDF", "*.pdf"));
        fileChooser.setInitialFileName("conseils_export_" + new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date()) + ".pdf");
        File file = fileChooser.showSaveDialog(conseilsTable.getScene().getWindow());

        if (file == null) {
            return;
        }

        try {
            Document document = new Document(PageSize.A4.rotate());
            PdfWriter.getInstance(document, new FileOutputStream(file));
            document.open();

            // Title
            Font titleFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD, 16, BaseColor.BLACK);
            Paragraph title = new Paragraph("Liste des Conseils", titleFont);
            title.setAlignment(Element.ALIGN_CENTER);
            title.setSpacingAfter(10);
            document.add(title);

            // Timestamp
            Font normalFont = FontFactory.getFont(FontFactory.HELVETICA, 10, BaseColor.BLACK);
            Paragraph timestamp = new Paragraph("Exporté le: " + new SimpleDateFormat("dd/MM/yyyy HH:mm:ss").format(new Date()), normalFont);
            timestamp.setAlignment(Element.ALIGN_LEFT);
            timestamp.setSpacingAfter(10);
            document.add(timestamp);

            // Table
            PdfPTable table = new PdfPTable(4);
            table.setWidthPercentage(100);
            table.setWidths(new float[]{1, 4, 2, 1});
            table.setSpacingBefore(10);

            // Headers
            Font headerFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD, 10, BaseColor.BLACK);
            String[] headers = {"ID", "Contenu", "Date Conseil", "Demande ID"};
            for (String header : headers) {
                PdfPCell cell = new PdfPCell(new Phrase(header, headerFont));
                cell.setHorizontalAlignment(Element.ALIGN_CENTER);
                cell.setPadding(5);
                table.addCell(cell);
            }

            // Data
            Font cellFont = FontFactory.getFont(FontFactory.HELVETICA, 10, BaseColor.BLACK);
            for (Conseil conseil : conseilsList) {
                table.addCell(createCell(String.valueOf(conseil.getId()), cellFont));
                table.addCell(createCell(truncate(conseil.getContenu(), 50), cellFont));
                table.addCell(createCell(conseil.getDateConseil().toString(), cellFont));
                table.addCell(createCell(String.valueOf(conseil.getIdDemande()), cellFont));
            }

            document.add(table);
            document.close();

            showNotification("✅ Succès", "PDF exporté avec succès : " + file.getAbsolutePath(), "success");
        } catch (DocumentException | IOException e) {
            System.err.println("Error exporting PDF: " + e.getMessage());
            showNotification("❌ Erreur", "Échec de l'exportation du PDF : " + e.getMessage(), "error");
        }
    }

    private PdfPCell createCell(String content, Font font) {
        PdfPCell cell = new PdfPCell(new Phrase(content, font));
        cell.setPadding(5);
        cell.setHorizontalAlignment(Element.ALIGN_LEFT);
        return cell;
    }

    private String truncate(String text, int maxLength) {
        if (text == null) {
            return "";
        }
        if (text.length() <= maxLength) {
            return text;
        }
        return text.substring(0, maxLength - 3) + "...";
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

    private void updateCharts(List<Conseil> filteredList) {
        // Update Pie Chart
        Map<Integer, Long> demandeCounts = filteredList.stream()
                .collect(Collectors.groupingBy(Conseil::getIdDemande, Collectors.counting()));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        demandeCounts.forEach((demandeId, count) ->
                pieChartData.add(new PieChart.Data("Demande " + demandeId, count))
        );
        demandePieChart.setData(pieChartData);

        // Update Bar Chart
        Map<String, Integer> dateCounts = filteredList.stream()
                .collect(Collectors.groupingBy(
                        c -> c.getDateConseil().toLocalDate().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(c -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Conseils");
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

    private Comparator<Conseil> getComparator(String sortOption) {
        switch (sortOption) {
            case "Z-A":
                return (c1, c2) -> c2.getContenu().compareToIgnoreCase(c1.getContenu());
            case "Date Asc":
                return Comparator.comparing(Conseil::getDateConseil);
            case "Date Desc":
                return (c1, c2) -> c2.getDateConseil().compareTo(c1.getDateConseil());
            default:
                return (c1, c2) -> c1.getContenu().compareToIgnoreCase(c2.getContenu());
        }
    }
}