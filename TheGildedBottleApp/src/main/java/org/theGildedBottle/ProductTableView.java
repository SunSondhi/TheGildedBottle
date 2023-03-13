package org.theGildedBottle;


import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.sql.*;

public class ProductTableView {
    private JTable table1;
    protected JPanel ProductTableView;
    private JButton goHomepageButton;

    private Statement stmt;


    public ProductTableView(ContentManager cM){


        try{
            String[] columnNames = {"ID", "Name", "Price", "Quantity"};
            DefaultTableModel model = new DefaultTableModel(columnNames, 0);
            Connection con = DbCon.getConnection();
            // load data from the ResultSet into the model
            String sql = "SELECT * FROM products";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                String name = resultSet.getString("name");
                double price = resultSet.getDouble("price");
                int quantity = resultSet.getInt("quantity");
                Object[] row = {id, name, price, quantity};
                model.addRow(row);
            }
            table1.setModel(model);

        }catch(SQLException E){
            E.printStackTrace();
        }

        goHomepageButton.addActionListener(cM);
        goHomepageButton.setActionCommand("Homepage");


    }

}
