package org.theGildedBottle;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class ProcessOrder {

    public JPanel ProductTableView;
    protected JPanel ProcessOrder;
    public JTable table2;
    protected JButton goHomepageButton;
    JComboBox orderSelect;
    JButton cancelButton;
    JButton processButton;


    public ProcessOrder(ContentManager cM){
        refreshTable();
        cancelButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    String orderID = String.valueOf(orderSelect.getSelectedItem());
                    Connection con = DbCon.getConnection();
                    PreparedStatement stmt = con.prepareStatement("UPDATE purchases SET in_progress = 2 WHERE id = ?");
                    stmt.setInt(1, Integer.parseInt(orderID));
                    stmt.executeUpdate();

                    int newStock = getStock(Integer.parseInt(orderID));
                    String name = getOrder(Integer.parseInt(orderID));
                    PreparedStatement stmt2 = con.prepareStatement("UPDATE products SET stock = stock+" + newStock + " WHERE name = ?");

                    stmt2.setString(1, name);
                    stmt2.executeUpdate();
                    refreshTable();

                }catch (SQLException ex) {
                    throw new RuntimeException(ex);
                }
                JOptionPane.showMessageDialog(ProductTableView, "Order Cancelled!");
            }
        });
        processButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    String orderID = String.valueOf(orderSelect.getSelectedItem());
                    Connection con = DbCon.getConnection();
                    String sql = "UPDATE purchases SET in_progress = 1 WHERE id = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);

                    int State = getOrderState(Integer.parseInt(orderID));
                    int newStock = getStock(Integer.parseInt(orderID));
                    String name = getOrder(Integer.parseInt(orderID));
                    if (State == 2){
                        PreparedStatement stmt2 = con.prepareStatement("UPDATE products SET stock = stock-" + newStock + " WHERE name = ?");
                        stmt2.setString(1, name);

                        stmt2.executeUpdate();
                    }

                    stmt.setInt(1,Integer.parseInt(orderID));
                    stmt.executeUpdate();
                    refreshTable();
                }catch (SQLException ex) {
                    throw new RuntimeException(ex);
                }
                JOptionPane.showMessageDialog(ProductTableView, "Order Processed!");
            }
        });
        goHomepageButton.addActionListener(cM);
        goHomepageButton.setActionCommand("Homepage");
    }

    public void refreshTable(){
        try{
            orderSelect.removeAllItems();
            String[] columnNames = {"ID", "User","Name", "Price", "Quantity","Creation Time","Status"};
            DefaultTableModel model = new DefaultTableModel(columnNames, 0);
            Connection con = DbCon.getConnection();
            // load data from the ResultSet into the model
            String sql = "SELECT * FROM purchases";
            PreparedStatement stmt = con.prepareStatement(sql);
            ResultSet resultSet = stmt.executeQuery();
            String orderStatus = "None";
            while (resultSet.next()) {
                System.out.println(resultSet);
                int id = resultSet.getInt("id");
                String name = resultSet.getString("name");
                double price = resultSet.getDouble("price");
                int user = resultSet.getInt("user_id");
                int quantity = resultSet.getInt("quantity");
                String createTime = resultSet.getString("created_at");
                int status = resultSet.getInt("in_progress");
                if (status == 0){
                    orderStatus = "Processing";
                }else if (status == 1){
                    orderStatus = "Processed";
                }else if (status == 2){
                    orderStatus = "Cancelled";
                }else if (status == 3){
                    orderStatus = "Delivered";
                }else{
                    orderStatus = "Status Not Available";
                }
                Object[] row = {id, user ,name, price, quantity, createTime, orderStatus};
                model.addRow(row);
                orderSelect.addItem(id);
            }
            table2.setModel(model);

        }catch(SQLException E){
            E.printStackTrace();
        }
    }


    public int getStock(int orderID){
        try{
            Connection con = DbCon.getConnection();
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM purchases");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                if (orderID == id){
                    int quantity = resultSet.getInt("quantity");
                    return quantity;
                }

            }
            return 0;
        }catch(SQLException E){
            E.printStackTrace();
        }
        return 0;
    };
    public String getOrder(int orderID){
        try{
            Connection con = DbCon.getConnection();
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM purchases");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                if (orderID == id){
                    return resultSet.getString("name");
                }
            }
            return "NONE";
        }catch(SQLException E){
            E.printStackTrace();
        }
        return "NONE";
    };

    public int getOrderState(int orderID){
        try{
            Connection con = DbCon.getConnection();
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM purchases");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                if (orderID == id){
                    return resultSet.getInt("in_progress");
                }

            }
            return 0;
        }catch(SQLException E){
            E.printStackTrace();
        }
        return 0;
    }
};


