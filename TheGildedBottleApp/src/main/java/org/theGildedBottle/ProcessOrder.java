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
    protected JTable table2;
    protected JButton goHomepageButton;
    private JComboBox orderSelect;
    private JButton cancelButton;
    private JButton processButton;

    private int orderID;

    public ProcessOrder(ContentManager cM){
        refreshTable();
        cancelButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    Connection con = DbCon.getConnection();
                    String sql = "UPDATE purchases SET in_progress = 2 WHERE id = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);
                    stmt.setInt(1, orderID);

                    stmt.executeUpdate();
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
                    Connection con = DbCon.getConnection();
                    String sql = "UPDATE purchases SET in_progress = 1 WHERE id = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);
                    stmt.setInt(1, orderID);
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
                orderID = id;
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


}
