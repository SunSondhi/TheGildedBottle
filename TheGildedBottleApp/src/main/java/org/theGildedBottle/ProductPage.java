package org.theGildedBottle;

import com.sun.source.doctree.BlockTagTree;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.Statement;

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
                String sql = "INSERT INTO products (name, price, quantity,percentage,description,productCat,type,flavour,image) VALUES ('" + name + "', " + price + ", " + quantity + "," + percentage + ","+description+","+productCAT+","+type+","+flavour + "," + image +")";
                stmt.executeUpdate(sql);

            } catch (Exception ex) {
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
    }
}
