package org.theGildedBottle;

import javax.swing.*;
import javax.swing.plaf.FontUIResource;
import javax.swing.table.DefaultTableModel;
import javax.swing.text.StyleContext;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Locale;

public class ProcessOrder {

    public JPanel ProductTableView;
    protected JPanel ProcessOrder;
    public JTable table2;
    protected JButton goHomepageButton;
    JComboBox orderSelect;
    JButton cancelButton;
    JButton processButton;


    public ProcessOrder(ContentManager cM) {
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

                } catch (SQLException ex) {
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
                    if (State == 2) {
                        PreparedStatement stmt2 = con.prepareStatement("UPDATE products SET stock = stock-" + newStock + " WHERE name = ?");
                        stmt2.setString(1, name);

                        stmt2.executeUpdate();
                    }

                    stmt.setInt(1, Integer.parseInt(orderID));
                    stmt.executeUpdate();
                    refreshTable();
                } catch (SQLException ex) {
                    throw new RuntimeException(ex);
                }
                JOptionPane.showMessageDialog(ProductTableView, "Order Processed!");
            }
        });
        goHomepageButton.addActionListener(cM);
        goHomepageButton.setActionCommand("Homepage");
    }

    public void refreshTable() {
        try {
            orderSelect.removeAllItems();
            String[] columnNames = {"ID", "User", "Name", "Price", "Quantity", "Creation Time", "Status"};
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
                if (status == 0) {
                    orderStatus = "Processing";
                } else if (status == 1) {
                    orderStatus = "Processed";
                } else if (status == 2) {
                    orderStatus = "Cancelled";
                } else if (status == 3) {
                    orderStatus = "Delivered";
                } else {
                    orderStatus = "Status Not Available";
                }
                Object[] row = {id, user, name, price, quantity, createTime, orderStatus};
                model.addRow(row);
                orderSelect.addItem(id);
            }
            table2.setModel(model);

        } catch (SQLException E) {
            E.printStackTrace();
        }
    }


    public int getStock(int orderID) {
        try {
            Connection con = DbCon.getConnection();
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM purchases");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                if (orderID == id) {
                    int quantity = resultSet.getInt("quantity");
                    return quantity;
                }

            }
            return 0;
        } catch (SQLException E) {
            E.printStackTrace();
        }
        return 0;
    }

    ;

    public String getOrder(int orderID) {
        try {
            Connection con = DbCon.getConnection();
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM purchases");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                if (orderID == id) {
                    return resultSet.getString("name");
                }
            }
            return "NONE";
        } catch (SQLException E) {
            E.printStackTrace();
        }
        return "NONE";
    }

    ;

    public int getOrderState(int orderID) {
        try {
            Connection con = DbCon.getConnection();
            PreparedStatement stmt = con.prepareStatement("SELECT * FROM purchases");
            ResultSet resultSet = stmt.executeQuery();
            while (resultSet.next()) {
                int id = resultSet.getInt("id");
                if (orderID == id) {
                    return resultSet.getInt("in_progress");
                }

            }
            return 0;
        } catch (SQLException E) {
            E.printStackTrace();
        }
        return 0;
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
        ProcessOrder = new JPanel();
        ProcessOrder.setLayout(new com.intellij.uiDesigner.core.GridLayoutManager(11, 7, new Insets(0, 0, 0, 0), -1, -1));
        final JScrollPane scrollPane1 = new JScrollPane();
        Font scrollPane1Font = this.$$$getFont$$$("JetBrains Mono ExtraLight", -1, -1, scrollPane1.getFont());
        if (scrollPane1Font != null) scrollPane1.setFont(scrollPane1Font);
        ProcessOrder.add(scrollPane1, new com.intellij.uiDesigner.core.GridConstraints(1, 0, 7, 7, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_BOTH, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        table2 = new JTable();
        Font table2Font = this.$$$getFont$$$("JetBrains Mono ExtraLight", -1, -1, table2.getFont());
        if (table2Font != null) table2.setFont(table2Font);
        scrollPane1.setViewportView(table2);
        final JLabel label1 = new JLabel();
        label1.setText("Orders");
        ProcessOrder.add(label1, new com.intellij.uiDesigner.core.GridConstraints(0, 3, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_NONE, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer1 = new com.intellij.uiDesigner.core.Spacer();
        ProcessOrder.add(spacer1, new com.intellij.uiDesigner.core.GridConstraints(8, 0, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_VERTICAL, 1, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        processButton = new JButton();
        processButton.setText("Process");
        ProcessOrder.add(processButton, new com.intellij.uiDesigner.core.GridConstraints(9, 1, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        orderSelect = new JComboBox();
        ProcessOrder.add(orderSelect, new com.intellij.uiDesigner.core.GridConstraints(8, 1, 1, 3, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_WEST, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        goHomepageButton = new JButton();
        goHomepageButton.setText("Back");
        ProcessOrder.add(goHomepageButton, new com.intellij.uiDesigner.core.GridConstraints(9, 5, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        cancelButton = new JButton();
        cancelButton.setText("Cancel");
        ProcessOrder.add(cancelButton, new com.intellij.uiDesigner.core.GridConstraints(9, 3, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_SHRINK | com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_CAN_GROW, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_FIXED, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer2 = new com.intellij.uiDesigner.core.Spacer();
        ProcessOrder.add(spacer2, new com.intellij.uiDesigner.core.GridConstraints(10, 5, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_VERTICAL, 1, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer3 = new com.intellij.uiDesigner.core.Spacer();
        ProcessOrder.add(spacer3, new com.intellij.uiDesigner.core.GridConstraints(10, 0, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, 1, null, null, null, 0, false));
        final com.intellij.uiDesigner.core.Spacer spacer4 = new com.intellij.uiDesigner.core.Spacer();
        ProcessOrder.add(spacer4, new com.intellij.uiDesigner.core.GridConstraints(8, 6, 1, 1, com.intellij.uiDesigner.core.GridConstraints.ANCHOR_CENTER, com.intellij.uiDesigner.core.GridConstraints.FILL_HORIZONTAL, com.intellij.uiDesigner.core.GridConstraints.SIZEPOLICY_WANT_GROW, 1, null, null, null, 0, false));
    }

    /**
     * @noinspection ALL
     */
    private Font $$$getFont$$$(String fontName, int style, int size, Font currentFont) {
        if (currentFont == null) return null;
        String resultName;
        if (fontName == null) {
            resultName = currentFont.getName();
        } else {
            Font testFont = new Font(fontName, Font.PLAIN, 10);
            if (testFont.canDisplay('a') && testFont.canDisplay('1')) {
                resultName = fontName;
            } else {
                resultName = currentFont.getName();
            }
        }
        Font font = new Font(resultName, style >= 0 ? style : currentFont.getStyle(), size >= 0 ? size : currentFont.getSize());
        boolean isMac = System.getProperty("os.name", "").toLowerCase(Locale.ENGLISH).startsWith("mac");
        Font fontWithFallback = isMac ? new Font(font.getFamily(), font.getStyle(), font.getSize()) : new StyleContext().getFont(font.getFamily(), font.getStyle(), font.getSize());
        return fontWithFallback instanceof FontUIResource ? fontWithFallback : new FontUIResource(fontWithFallback);
    }

    /**
     * @noinspection ALL
     */
    public JComponent $$$getRootComponent$$$() {
        return ProcessOrder;
    }
};


