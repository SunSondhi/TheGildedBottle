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
            dtf = DateTimeFormatter.ofPattern("yyyy-MM-dd_HH-mm"); //creating a date and time format that windows' file system will support
            String filename = "TheGildedBottleReport_" + dtf.format(LocalDateTime.now()) + ".pdf"; // formatting a string to make a filename for the pdf
            PdfWriter.getInstance(document, new FileOutputStream(filename)); //new pdf
            document.open();
            Font headerFont = FontFactory.getFont(FontFactory.COURIER, 16, BaseColor.BLACK);
            Font bodyFont = FontFactory.getFont(FontFactory.COURIER, 11, BaseColor.BLACK);
            PdfPTable purchaseTable = new PdfPTable(6); //creating tables
            PdfPTable stockTable = new PdfPTable(3);
            document.add(new Chunk("The Gilded Bottle sales \n ", headerFont));
            document.newPage();
            //adding tables
            document.add(new Chunk("        Purchases to date", bodyFont));
            MakePurchaseTable(purchaseTable);
            document.add(purchaseTable);
            document.add(new Chunk("        Current stock levels",bodyFont));
            MakeStockTable(stockTable);
            document.add(stockTable);
            document.close();
        }
        catch (FileNotFoundException | DocumentException f) {f.printStackTrace();}
    }
    private void MakePurchaseTable(PdfPTable table) {
        Stream.of("ID", "item name", "UserID", "price", "quantity", "order time").forEach(columnTitle -> { //setting column titles
            PdfPCell head = new PdfPCell();
            head.setBackgroundColor(BaseColor.LIGHT_GRAY);
            head.setBorderWidth(1);
            head.setPhrase(new Phrase(columnTitle));
            table.addCell(head);
            table.setSpacingAfter(15f);
        } );
        try {
            Connection con = DbCon.getConnection(); //Connect to DB
            String sql = "SELECT * FROM purchases";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) { //Parse DB data
                int id = resultSet.getInt("id");
                String name = resultSet.getString("name");
                int user_id = resultSet.getInt("user_id");
                double price = resultSet.getDouble("price");
                int quantity = resultSet.getInt("quantity");
                Timestamp timestamp = resultSet.getTimestamp("created_at");
                //Add data to table
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
        Stream.of("ID", "item name", "Stock Count").forEach(columnTitle -> {//Connect to DB
            PdfPCell head = new PdfPCell();
            head.setBackgroundColor(BaseColor.LIGHT_GRAY);
            head.setBorderWidth(1);
            head.setPhrase(new Phrase(columnTitle));
            table.addCell(head);
            table.setSpacingBefore(10f);
            table.setSpacingAfter(15f);
        });
        try {
            Connection con = DbCon.getConnection();//Parse DB data
            String sql = "SELECT * FROM products ORDER BY stock ASC";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                String name = resultSet.getString("name");
                int stock = resultSet.getInt("stock");
                //Add data to table
                PdfPCell c = new PdfPCell();
                c.setBackgroundColor((stock < lowStockThreshold) ? dangerColour : (stock < warningStockThreshold) ? warningColour : cellColour); //Colour code based on stock levels
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
