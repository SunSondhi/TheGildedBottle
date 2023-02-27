package org.theGildedBottle;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.sql.*;

public class ProductPanel extends JPanel  {
    public DbCon Con =  new DbCon();
    protected JTextField textField;
    protected JButton submitButton;

    private JLabel nameLabel, priceLabel, quantityLabel, descriptionLabel, productCatLabel;
    private JLabel typeLabel, percentageLabel, flavourLabel, imageLabel;
    private JTextField nameField, priceField, quantityField, productCatField;
    private JTextField typeField, percentageField, flavourField, imageField;
    private JTextArea descriptionField;
    private JButton addButton;
    private Statement stmt;

    public ProductPanel( ) {
        super();
        this.setBackground(Color.red);

        this.add(queryBtn());
        submitButton.setVisible(true);


        nameLabel = new JLabel("Name:");
        nameField = new JTextField(20);
        priceLabel = new JLabel("Price:");
        priceField = new JTextField(20);
        quantityLabel = new JLabel("Quantity:");
        quantityField = new JTextField(20);
        descriptionLabel = new JLabel("description:");
        descriptionField = new JTextArea();
        productCatLabel = new JLabel("Product Category:");
        productCatField = new JTextField(20);
        typeLabel = new JLabel("type:");
        typeField = new JTextField(20);
        percentageLabel = new JLabel("percentage:");
        percentageField = new JTextField(20);
        flavourLabel = new JLabel("flavour:");
        flavourField = new JTextField(20);
        imageLabel = new JLabel("image:");
        imageField = new JTextField(20);


        setLayout(new FlowLayout());
        add(nameLabel);
        add(nameField);
        add(priceLabel);
        add(priceField);
        add(quantityLabel);
        add(quantityField);
        add(descriptionLabel);
        add(descriptionField);
        add(productCatLabel);
        add(productCatField);
        add(typeLabel);
        add(typeField);
        add(percentageLabel);
        add(percentageField);
        add(flavourLabel);
        add(flavourField);
        add(imageLabel);
        add(imageField);

        this.add(addProductBtn());
        addButton.setVisible(true);




        try {
            Connection con = DbCon.getConnection();
            stmt = con.createStatement();
        } catch (Exception e) {
            e.printStackTrace();
        }


        this.setVisible(true);


    }

    private JButton queryBtn(){
        submitButton = new JButton("Insert into table");
        submitButton.setBounds(100,100,100,40);
        // action on click, Con is the obj for DbCon class
        submitButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                Con.setQueryInput();
            }
        });
        return submitButton;
    }


    private JButton addProductBtn(){
        addButton = new JButton("Add product");
        addButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                String name = nameField.getText();
                double price = Double.parseDouble(priceField.getText());
                int quantity = Integer.parseInt(quantityField.getText());
                int percentage = Integer.parseInt(percentageField.getText());
                String description = descriptionField.getText();
                String productCAT = productCatField.getText();
                String type = typeField.getText();
                String flavour = flavourField.getText();
                String image = imageField.getText();


                try {
                    String sql = "INSERT INTO products (name, price, quantity,percentage,description,productCat,type,flavour,image) VALUES ('" + name + "', " + price + ", " + quantity + "," + percentage + ","+description+","+productCAT+","+type+","+flavour + "," + image +")";
                    stmt.executeUpdate(sql);
                    // Clear input fields for next entry
                    nameField.setText("");
                    priceField.setText("");
                    quantityField.setText("");
                    percentageField.setText("");
                    productCatField.setText("");
                    typeField.setText("");
                    flavourField.setText("");
                    imageField.setText("");
                } catch (Exception ex) {
                    ex.printStackTrace();
                }
            }
        });
        return addButton;
    }




}
