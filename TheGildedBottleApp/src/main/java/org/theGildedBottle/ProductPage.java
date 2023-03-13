package org.theGildedBottle;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;

import static org.theGildedBottle.DbCon.con;

public class ProductPage {
    public JPanel productsPanel;
    private JTextField nameField;
    private JTextField priceField;
    private JLabel priceLabel;
    private JTextField quantityField;
    private JLabel quantityLabel;
    private JTextField percentageField;
    private JLabel abvLabel;
    private JTextField categoryField;
    private JLabel categoryLabel;
    private JTextField typeField;
    private JLabel typeLabel;
    private JTextField flavourField;
    private JLabel flavourLabel;
    private JTextField imageField;
    private JLabel imageLabel;
    private JButton addProductButton;
    private JButton clearButton;
    private JLabel nameLabel;
    private JTextArea descriptionArea;
    private JLabel descriptionLabel;
    private JPanel p1;
    private JButton logoutButton;
    private JButton gotToHomepageButton;

    private Statement stmt;
    public DbCon Con =  new DbCon();

    public ProductPage(ContentManager cM) {
        try {
            Connection con = DbCon.getConnection();
            stmt = con.createStatement();
        } catch (Exception e) {
            e.printStackTrace();
        }
    addProductButton.addActionListener(new ActionListener() {
        @Override
        public void actionPerformed(ActionEvent e) {
            String name = nameField.getText();
            double price = Double.parseDouble(priceField.getText());
            int quantity = Integer.parseInt(quantityField.getText());
            int percentage = Integer.parseInt(percentageField.getText());
            String description = descriptionArea.getText();
            String productCAT = categoryField.getText();
            String type = typeField.getText();
            String flavour = flavourField.getText();
            String image = imageField.getText();
            try {
                String sql = "INSERT INTO products (name, price, quantity, percentage, description, productCat, type, flavour, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                PreparedStatement statement = con.prepareStatement(sql);
                statement.setString(1, name);
                statement.setDouble(2, price);
                statement.setInt(3, quantity);
                statement.setInt(4, percentage);
                statement.setString(5, description);
                statement.setString(6, productCAT);
                statement.setString(7, type);
                statement.setString(8, flavour);
                statement.setString(9, image);
                statement.executeUpdate();

            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        }
    });




    clearButton.addActionListener(new ActionListener() {
        @Override
        public void actionPerformed(ActionEvent e) {
            nameField.setText("");
            priceField.setText("");
            quantityField.setText("");
            percentageField.setText("");
            categoryField.setText("");
            typeField.setText("");
            flavourField.setText("");
            imageField.setText("");
            descriptionArea.setText("");
        }
    });
    logoutButton.addActionListener(cM);
    logoutButton.setActionCommand("Logout");

        gotToHomepageButton.addActionListener(cM);
        gotToHomepageButton.setActionCommand("Homepage");

    }
}
