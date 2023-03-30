package org.theGildedBottle;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class SearchProduct {
    JTextField textField1;
    JButton button1;
    JTable table1;
    JPanel searchProduct;
    JButton button2;


    public SearchProduct(ContentManager cM){


        button1.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

                try {
                    Connection con = DbCon.getConnection();
                    String searchInput = textField1.getText();
                    // Query user
                    PreparedStatement searchedProduct = con.prepareStatement("SELECT * FROM products WHERE name = ?;");
                    searchedProduct.setString(1, searchInput);

                    ResultSet resultSet = searchedProduct.executeQuery();

                    String[] columnNames = {"ID", "Name", "Price", "Stock"};
                    DefaultTableModel model = new DefaultTableModel(columnNames, 0);
                    while (resultSet.next()) {
                        int id = resultSet.getInt("id");
                        String name = resultSet.getString("name");
                        double price = resultSet.getDouble("price");
                        int stock = resultSet.getInt("stock");
                        Object[] row = {id, name, price, stock};
                        model.addRow(columnNames);
                        model.addRow(row);
                        table1.setModel(model);
                    }

                }catch (SQLException I){
                    I.printStackTrace();
                }
            }
        });

        button2.addActionListener(cM);
        button2.setActionCommand("Homepage");
    }


}
