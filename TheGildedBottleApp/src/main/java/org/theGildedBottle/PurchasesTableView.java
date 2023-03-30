package org.theGildedBottle;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.sql.*;

public class PurchasesTableView {
    private JTable table1;
    protected JPanel PurchasesTableView;
    private JButton goToHomepageButton;




    public PurchasesTableView(ContentManager cM){


        try{
            String[] columnNames = {"ID", "Name","User ID", "Price", "Quantity"};
            DefaultTableModel model = new DefaultTableModel(columnNames, 0);
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
                Object[] row = {id, name,user_id, price, quantity};
                model.addRow(row);
            }
            this.table1.setModel(model);

        }catch(SQLException E){
            E.printStackTrace();
        }

        goToHomepageButton.addActionListener(cM);
        goToHomepageButton.setActionCommand("Homepage");


    }
}
