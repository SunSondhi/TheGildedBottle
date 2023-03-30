package org.theGildedBottle;


import javax.mail.*;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
import javax.swing.*;
import java.awt.*;
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

        try {
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
        } catch (SQLException E) {
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
<<<<<<< Updated upstream
                try{
=======
                try {
                    String name = String.valueOf(chooseName.getSelectedItem());
>>>>>>> Stashed changes
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
                } catch (SQLException ex) {
                    ex.printStackTrace();
                }
            }
        });


    }
<<<<<<< Updated upstream

=======

    public void setStock() {
        try {
            String x = String.valueOf(chooseName.getSelectedItem());
            Connection con = DbCon.getConnection();
            // load data from the ResultSet into the model

            PreparedStatement stmt = con.prepareStatement("SELECT * FROM products");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {

                if (resultSet.getString("name").toString().contains(x.toString())) {

                    int stockLevel = resultSet.getInt("stock");
                    System.out.println(x + resultSet.getString("name").toString() + " " + stockLevel);
                    stockLabel.setText(String.valueOf(stockLevel));
                }

            }
        } catch (SQLException E) {
            E.printStackTrace();
        }
    }

>>>>>>> Stashed changes
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


    {
// GUI initializer generated by IntelliJ IDEA GUI Designer
// >>> IMPORTANT!! <<<
// DO NOT EDIT OR ADD ANY CODE HERE!
        $$$setupUI$$$();
    }

    /**
     * Method generated by IntelliJ IDEA GUI Designer
     * >>> IMPORTANT!! <<<
     * DO NOT edit this method OR call it in your code!
     *
     * @noinspection ALL
     */
    private void $$$setupUI$$$() {
        UpdateStockview = new JPanel();
        UpdateStockview.setLayout(new com.intellij.uiDesigner.core.GridLayoutManager(6, 6, new Insets(0, 0, 0, 0), -1, -1));
        final JLabel label1 = new JLabel();
        label1.setText("Name Of Product");
        UpdateStockview.add(label1, new com.intellij.uiDesigner.core.GridConstraints(1, 1, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_NONE, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        chooseName = new JComboBox();
        final DefaultComboBoxModel defaultComboBoxModel1 = new DefaultComboBoxModel();
        chooseName.setModel(defaultComboBoxModel1);
        UpdateStockview.add(chooseName, new com.intellij.uiDesigner.core.GridConstraints(1, 2, 1, 3, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer1 = new com.intellij.uiDesigner.core.Spacer();
        UpdateStockview.add(spacer1, new com.intellij.uiDesigner.core.GridConstraints(0, 3, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_VERTICAL, 1, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer2 = new com.intellij.uiDesigner.core.Spacer();
        UpdateStockview.add(spacer2, new com.intellij.uiDesigner.core.GridConstraints(4, 3, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_VERTICAL, 1, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        goToHomepageButton = new JButton();
        goToHomepageButton.setText("Back");
        UpdateStockview.add(goToHomepageButton, new com.intellij.uiDesigner.core.GridConstraints(5, 0, 1, 6, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        stockLabel = new JLabel();
        stockLabel.setText("stock:");
        UpdateStockview.add(stockLabel, new com.intellij.uiDesigner.core.GridConstraints(2, 3, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_NONE, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        stockChangeLabel = new JLabel();
        stockChangeLabel.setText("Set new stock amount: ");
        UpdateStockview.add(stockChangeLabel, new com.intellij.uiDesigner.core.GridConstraints(3, 1, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_NONE, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        stockField = new JTextField();
        UpdateStockview.add(stockField, new com.intellij.uiDesigner.core.GridConstraints(3, 3, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, new Dimension(150, -1), null, 0, false));
        submitButton = new JButton();
        submitButton.setText("Submit");
        UpdateStockview.add(submitButton, new com.intellij.uiDesigner.core.GridConstraints(3, 4, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, new Dimension(46, 30), null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer3 = new com.intellij.uiDesigner.core.Spacer();
        UpdateStockview.add(spacer3, new com.intellij.uiDesigner.core.GridConstraints(0, 0, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_VERTICAL, 1, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer4 = new com.intellij.uiDesigner.core.Spacer();
        UpdateStockview.add(spacer4, new com.intellij.uiDesigner.core.GridConstraints(2, 0, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, 1, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer5 = new com.intellij.uiDesigner.core.Spacer();
        UpdateStockview.add(spacer5, new com.intellij.uiDesigner.core.GridConstraints(0, 5, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_VERTICAL, 1, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer6 = new com.intellij.uiDesigner.core.Spacer();
        UpdateStockview.add(spacer6, new com.intellij.uiDesigner.core.GridConstraints(2, 5, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, 1, null, null, null, 0, false));
    }

    /**
     * @noinspection ALL
     */
    public JComponent $$$getRootComponent$$$() {
        return UpdateStockview;
    }
}
