package org.theGildedBottle;


import javax.mail.*;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;
import java.util.Properties;



public class UpdateStockView {

    JPanel UpdateStockview;
    JComboBox chooseName;
    JTextField currentStock;
    JButton decrease;
    JButton increase;
    JButton goToHomepageButton;

    private JLabel stockLabel;
    private String name;
    private Statement stmt;

    public UpdateStockView(ContentManager cM) {

        goToHomepageButton.addActionListener(cM);
        goToHomepageButton.setActionCommand("Homepage");

        try{
            Connection con = DbCon.getConnection();
            String sql = "SELECT * FROM products";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                name = resultSet.getString("name");
                chooseName.addItem(name);
                int stockLevel = resultSet.getInt("stock");
                stockLabel.setText(String.valueOf(stockLevel));
            }
        }catch (SQLException E){
            E.printStackTrace();
        }


        this.decrease.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    Connection con = DbCon.getConnection();
                    String sql = "UPDATE products SET stock = stock-1 WHERE name = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);
                    stmt.setString(1, name);
                    stmt.executeUpdate();
                    int stockLevel = getStockLevel(name);
                    if (stockLevel <= 0) {
                        // Show popup alert
                        JOptionPane.showMessageDialog(UpdateStockview, "Item is out of stock!");

                        // Send email alert
                        String subject = "Inventory Alert: " + name + " is out of stock!";
                        String message = "Dear User,\n\n" + name + " is out of stock. Please restock as soon as possible.\n\nBest regards,\nYour Inventory Management System";
                        sendEmail(subject, message);
                    } else if (stockLevel < 10) {
                        // Show popup alert
                        JOptionPane.showMessageDialog(UpdateStockview, "Item stock is low: " + stockLevel + " left!");

                        // Send email alert
                        String subject = "Inventory Alert: " + name + " stock is low!";
                        String message = "Dear User,\n\n" + name + " stock is low: " + stockLevel + " left. Please restock soon.\n\nBest regards,\nYour Inventory Management System";
                        sendEmail(subject, message);
                    }
                } catch (SQLException ex) {
                    ex.printStackTrace();
                }
            }
        });


        this.increase.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try{
                    Connection con = DbCon.getConnection();
                    String sql = "UPDATE products SET stock = stock+1 WHERE name = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);
                    stmt.setString(1, name);
                    stmt.executeUpdate();

                    // Check if stock is below threshold
                    String checkSql = "SELECT stock FROM products WHERE name = ?";
                    PreparedStatement checkStmt = con.prepareStatement(checkSql);
                    checkStmt.setString(1, name);
                    ResultSet rs = checkStmt.executeQuery();
                    int stockLevel = 0;
                    while (rs.next()) {
                        stockLevel = rs.getInt("stock");
                    }
                    if (stockLevel <= 5) {
                        // Show alert message and send email
                        String message = "Product " + name + " has fallen below the threshold stock level. Current stock level is " + stockLevel + ".";
                        JOptionPane.showMessageDialog(null, message, "Inventory Alert", JOptionPane.WARNING_MESSAGE);
                        sendEmail("Inventory Alert", message);
                    }
                }catch(SQLException ex){
                    ex.printStackTrace();
                }
            }
        });


    }

    private int getStockLevel(String itemName) throws SQLException {
        Connection con = DbCon.getConnection();
        String sql = "SELECT stock FROM products WHERE name = ?";
        PreparedStatement stmt = con.prepareStatement(sql);
        stmt.setString(1, itemName);
        ResultSet resultSet = stmt.executeQuery();
        int stockLevel = 0;
        if (resultSet.next()) {
            stockLevel = resultSet.getInt("stock");
        }
        return stockLevel;
    }

    private void showInventoryAlertPopup(String name, int stockLevel) {
        String message = "Low inventory for " + name + "! Current stock level is " + stockLevel;
        JOptionPane.showMessageDialog(UpdateStockview, message, "Inventory Alert", JOptionPane.WARNING_MESSAGE);
    }


    private void sendEmail(String subject, String message) {
        String recipient = "sunny.sondhi93@gmail.com";
        String sender = "sunny.sondhi93@gmail.com";
        String host = "smtp.gmail.com";
        String username = "sunny.sondhi93@gmail.com";
        String password = "nevbxzapunhztpze";

        Properties properties = System.getProperties();
        properties.setProperty("mail.smtp.auth", "true");
        properties.setProperty("mail.smtp.starttls.enable", "true");
        properties.setProperty("mail.smtp.host", "smtp.gmail.com");
        properties.setProperty("mail.smtp.port", "587");
        Authenticator auth = new Authenticator() {
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(username, password);
            }
        };
        Session session = Session.getDefaultInstance(properties, auth);
        try {
            MimeMessage msg = new MimeMessage(session);
            msg.setFrom(new InternetAddress(sender));
            msg.addRecipient(Message.RecipientType.TO, new InternetAddress(recipient));
            msg.setSubject(subject);
            msg.setText(message);
            Transport.send(msg);
        } catch (MessagingException ex) {
            ex.printStackTrace();
        }
    }


}
