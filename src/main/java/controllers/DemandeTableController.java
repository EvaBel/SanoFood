package controllers;

import com.itextpdf.text.*;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;
import entities.Demande;
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
import services.DemandeService;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.Comparator;
import java.util.Date;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

public class DemandeTableController {

    @FXML private TextField searchField;
    @FXML private ComboBox<String> specialiteFilter;
    @FXML private DatePicker minDateFilter;
    @FXML private DatePicker maxDateFilter;
    @FXML private ComboBox<String> sortFilter;
    @FXML private TableView<Demande> demandesTable;
    @FXML private TableColumn<Demande, Integer> idColumn;
    @FXML private TableColumn<Demande, String> nomColumn;
    @FXML private TableColumn<Demande, String> contentColumn;
    @FXML private TableColumn<Demande, LocalDate> dateInscriptionColumn;
    @FXML private TableColumn<Demande, Integer> authorIdColumn;
    @FXML private TableColumn<Demande, String> emailColumn;
    @FXML private TableColumn<Demande, String> specialiteColumn;
    @FXML private PieChart specialitePieChart;
    @FXML private BarChart<String, Number> dateBarChart;
    @FXML private CategoryAxis dateXAxis;
    @FXML private NumberAxis dateYAxis;
    @FXML private Button exportPdfButton;

    private DemandeService demandeService;
    private ObservableList<Demande> demandesList;
    private ObservableList<String> specialites;
    private ObservableList<String> sortOptions;

    @FXML
    public void initialize() {
        demandeService = new DemandeService();
        demandesList = FXCollections.observableArrayList();
        specialites = FXCollections.observableArrayList();
        sortOptions = FXCollections.observableArrayList("A-Z", "Z-A", "Date Asc", "Date Desc");

        // Initialize table columns
        idColumn.setCellValueFactory(new PropertyValueFactory<>("id"));
        nomColumn.setCellValueFactory(new PropertyValueFactory<>("nom"));
        contentColumn.setCellValueFactory(new PropertyValueFactory<>("content"));
        dateInscriptionColumn.setCellValueFactory(new PropertyValueFactory<>("dateInscription"));
        authorIdColumn.setCellValueFactory(new PropertyValueFactory<>("authorId"));
        emailColumn.setCellValueFactory(new PropertyValueFactory<>("email"));
        specialiteColumn.setCellValueFactory(new PropertyValueFactory<>("specialite"));

        // Load data
        loadDemandes();
        loadFilters();
        loadCharts();

        // Set table and filter data
        demandesTable.setItems(demandesList);
        specialiteFilter.setItems(specialites);
        sortFilter.setItems(sortOptions);

        // Add "Toutes" option to specialite filter
        specialites.add(0, "Toutes");

        // Set default sort option
        sortFilter.setValue("A-Z");
    }

    private void loadDemandes() {
        demandesList.clear();
        demandesList.addAll(demandeService.getAll());
    }

    private void loadFilters() {
        specialites.addAll(demandeService.getAll()
                .stream()
                .map(Demande::getSpecialite)
                .filter(s -> s != null)
                .distinct()
                .collect(Collectors.toList()));
    }

    private void loadCharts() {
        // Pie Chart: Demande distribution by specialite
        Map<String, Integer> specialiteCounts = demandeService.getAll()
                .stream()
                .filter(d -> d.getSpecialite() != null)
                .collect(Collectors.groupingBy(Demande::getSpecialite, Collectors.summingInt(d -> 1)));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        specialiteCounts.forEach((specialite, count) ->
                pieChartData.add(new PieChart.Data(specialite, count))
        );
        specialitePieChart.setData(pieChartData);
        specialitePieChart.setTitle("Demandes par Spécialité");

        // Bar Chart: Demandes by date
        Map<String, Integer> dateCounts = demandeService.getAll()
                .stream()
                .collect(Collectors.groupingBy(
                        d -> d.getDateInscription().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(d -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Demandes");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().add(dateSeries);
        dateBarChart.setTitle("Demandes par Date");
    }

    @FXML
    private void filterDemandes() {
        String searchText = searchField.getText().trim().toLowerCase();
        String selectedSpecialite = specialiteFilter.getValue() != null ? specialiteFilter.getValue() : "Toutes";
        String selectedSort = sortFilter.getValue() != null ? sortFilter.getValue() : "A-Z";
        LocalDate minDate = minDateFilter.getValue();
        LocalDate maxDate = maxDateFilter.getValue();

        List<Demande> filteredList = demandeService.getAll()
                .stream()
                .filter(d -> d.getNom().toLowerCase().contains(searchText) || d.getContent().toLowerCase().contains(searchText))
                .filter(d -> selectedSpecialite.equals("Toutes") || (d.getSpecialite() != null && d.getSpecialite().equals(selectedSpecialite)))
                .filter(d -> minDate == null || !d.getDateInscription().isBefore(minDate))
                .filter(d -> maxDate == null || !d.getDateInscription().isAfter(maxDate))
                .sorted(getComparator(selectedSort))
                .collect(Collectors.toList());

        demandesList.clear();
        demandesList.addAll(filteredList);

        // Update charts based on filtered data
        updateCharts(filteredList);
    }

    @FXML
    private void exportToPDF() {
        if (demandesList.isEmpty()) {
            showNotification("❌ Erreur", "Aucune demande à exporter.", "error");
            return;
        }

        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Enregistrer le PDF");
        fileChooser.getExtensionFilters().add(new FileChooser.ExtensionFilter("Fichiers PDF", "*.pdf"));
        fileChooser.setInitialFileName("demandes_export_" + new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date()) + ".pdf");
        File file = fileChooser.showSaveDialog(demandesTable.getScene().getWindow());

        if (file == null) {
            return;
        }

        try {
            Document document = new Document(PageSize.A4.rotate());
            PdfWriter.getInstance(document, new FileOutputStream(file));
            document.open();

            // Title
            Font titleFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD, 16, BaseColor.BLACK);
            Paragraph title = new Paragraph("Liste des Demandes", titleFont);
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
            PdfPTable table = new PdfPTable(7);
            table.setWidthPercentage(100);
            table.setWidths(new float[]{1, 2, 3, 1.5f, 1, 2, 1.5f});
            table.setSpacingBefore(10);

            // Headers
            Font headerFont = FontFactory.getFont(FontFactory.HELVETICA_BOLD, 10, BaseColor.BLACK);
            String[] headers = {"ID", "Nom", "Contenu", "Date Inscription", "Auteur ID", "Email", "Spécialité"};
            for (String header : headers) {
                PdfPCell cell = new PdfPCell(new Phrase(header, headerFont));
                cell.setHorizontalAlignment(Element.ALIGN_CENTER);
                cell.setPadding(5);
                table.addCell(cell);
            }

            // Data
            Font cellFont = FontFactory.getFont(FontFactory.HELVETICA, 10, BaseColor.BLACK);
            for (Demande demande : demandesList) {
                table.addCell(createCell(String.valueOf(demande.getId()), cellFont));
                table.addCell(createCell(truncate(demande.getNom(), 20), cellFont));
                table.addCell(createCell(truncate(demande.getContent(), 30), cellFont));
                table.addCell(createCell(demande.getDateInscription().toString(), cellFont));
                table.addCell(createCell(demande.getAuthorId() != null ? String.valueOf(demande.getAuthorId()) : "", cellFont));
                table.addCell(createCell(demande.getEmail(), cellFont));
                table.addCell(createCell(demande.getSpecialite() != null ? demande.getSpecialite() : "", cellFont));
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

    private void updateCharts(List<Demande> filteredList) {
        // Update Pie Chart
        Map<String, Long> specialiteCounts = filteredList.stream()
                .filter(d -> d.getSpecialite() != null)
                .collect(Collectors.groupingBy(Demande::getSpecialite, Collectors.counting()));
        ObservableList<PieChart.Data> pieChartData = FXCollections.observableArrayList();
        specialiteCounts.forEach((specialite, count) ->
                pieChartData.add(new PieChart.Data(specialite, count))
        );
        specialitePieChart.setData(pieChartData);

        // Update Bar Chart
        Map<String, Integer> dateCounts = filteredList.stream()
                .collect(Collectors.groupingBy(
                        d -> d.getDateInscription().format(DateTimeFormatter.ofPattern("yyyy-MM-dd")),
                        Collectors.summingInt(d -> 1)
                ));
        XYChart.Series<String, Number> dateSeries = new XYChart.Series<>();
        dateSeries.setName("Demandes");
        dateCounts.forEach((date, count) ->
                dateSeries.getData().add(new XYChart.Data<>(date, count))
        );
        dateBarChart.getData().clear();
        dateBarChart.getData().add(dateSeries);
    }

    private Comparator<Demande> getComparator(String sortOption) {
        switch (sortOption) {
            case "Z-A":
                return (d1, d2) -> d2.getNom().compareToIgnoreCase(d1.getNom());
            case "Date Asc":
                return Comparator.comparing(Demande::getDateInscription);
            case "Date Desc":
                return (d1, d2) -> d2.getDateInscription().compareTo(d1.getDateInscription());
            default:
                return (d1, d2) -> d1.getNom().compareToIgnoreCase(d2.getNom());
        }
    }
}