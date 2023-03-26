package org.theGildedBottle;

import com.itextpdf.text.*;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;

import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.sql.*;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.stream.Stream;

public class ReportGenerator {
    Document document;
    DateTimeFormatter dtf;
    BaseColor cellColour = new BaseColor(220,220,220);
    BaseColor dangerColour = new BaseColor(209, 88, 88);
    BaseColor warningColour = new BaseColor(222, 136, 67);
    private int lowStockThreshold = 5;
    private int warningStockThreshold = 10;

    public ReportGenerator() throws FileNotFoundException, DocumentException {
        document = new Document();
        try {
            dtf = DateTimeFormatter.ofPattern("yyyy-MM-dd_HH-mm");
            String filename = "TheGildedBottleReport_" + dtf.format(LocalDateTime.now()) + ".pdf";
            PdfWriter.getInstance(document, new FileOutputStream(filename));
            document.open();
            Font headerFont = FontFactory.getFont(FontFactory.COURIER, 16, BaseColor.BLACK);
            Font bodyFont = FontFactory.getFont(FontFactory.COURIER, 11, BaseColor.BLACK);
            PdfPTable purchaseTable = new PdfPTable(6);
            PdfPTable stockTable = new PdfPTable(3);
            document.add(new Chunk("The Gilded Bottle sales", headerFont));
            MakePurchaseTable(purchaseTable);
            document.add(purchaseTable);
            MakeStockTable(stockTable);
            document.add(stockTable);
            document.close();
        }
        catch (FileNotFoundException | DocumentException f) {f.printStackTrace();}
    }

    public static void main(String[] args) throws DocumentException, FileNotFoundException {
        ReportGenerator test = new ReportGenerator();
    }

    private void MakePurchaseTable(PdfPTable table) {
        Stream.of("ID", "item name", "UserID", "price", "quantity", "order time").forEach(columnTitle -> {
            PdfPCell head = new PdfPCell();
            head.setBackgroundColor(BaseColor.LIGHT_GRAY);
            head.setBorderWidth(1);
            head.setPhrase(new Phrase(columnTitle));
            table.addCell(head);
        } );
        try {
            Connection con = DbCon.getConnection();
            // load data from the ResultSet into the model
            String sql = "SELECT * FROM purchases";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                String name = resultSet.getString("name");
                int user_id = resultSet.getInt("user_id");
                double price = resultSet.getDouble("price");
                int quantity = resultSet.getInt("quantity");
                Timestamp timestamp = resultSet.getTimestamp("created_at");
                PdfPCell c = new PdfPCell();
                c.setBackgroundColor(cellColour);
                c.setBorderWidth(1);
                c.setPhrase(new Phrase(String.valueOf(id)));
                table.addCell(c);
                c.setPhrase(new Phrase(name));
                table.addCell(c);
                c.setPhrase(new Phrase(String.valueOf(user_id)));
                table.addCell(c);
                c.setPhrase(new Phrase(String.valueOf(price)));
                table.addCell(c);
                c.setPhrase(new Phrase(String.valueOf(quantity)));
                table.addCell(c);
                c.setPhrase(new Phrase(String.valueOf(timestamp)));
                table.addCell(c);
            }
        }  catch (SQLException s) {s.printStackTrace();}
    }
    private void MakeStockTable(PdfPTable table) {
        Stream.of("ID", "item name", "Stock Count").forEach(columnTitle -> {
            PdfPCell head = new PdfPCell();
            head.setBackgroundColor(BaseColor.LIGHT_GRAY);
            head.setBorderWidth(1);
            head.setPhrase(new Phrase(columnTitle));
            table.addCell(head);
        });
        try {
            Connection con = DbCon.getConnection();
            String sql = "SELECT * FROM products ORDER BY stock ASC";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                String name = resultSet.getString("name");
                int stock = resultSet.getInt("stock");

                PdfPCell c = new PdfPCell();
                c.setBackgroundColor((stock < lowStockThreshold) ? dangerColour : (stock < warningStockThreshold) ? warningColour : cellColour);
                c.setBorderWidth(1);
                c.setPhrase(new Phrase(String.valueOf(id)));
                table.addCell(c);
                c.setPhrase(new Phrase(name));
                table.addCell(c);
                c.setPhrase(new Phrase(String.valueOf(stock)));
                table.addCell(c);
            }
        } catch (SQLException s) {
            s.printStackTrace();
        }
    }
}
