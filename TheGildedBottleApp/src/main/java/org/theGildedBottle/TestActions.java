package org.theGildedBottle;

import org.junit.jupiter.api.Test;

import javax.swing.*;

import static org.junit.jupiter.api.Assertions.*;

class ProcessOrderTest {

    @Test
    void cancelOrderTest() {
        // Set up test data
        String[] orderIDs = {"123", "456", "789"};
        JComboBox<String> orderSelect = new JComboBox<>(orderIDs);
        JButton cancelButton = new JButton();
        JPanel ProductTableView = new JPanel();
        ProcessOrder processOrder = new ProcessOrder(new ContentManager());

        // Simulate cancelling an order
        orderSelect.setSelectedIndex(1);
        cancelButton.doClick();

        // Check that the order was cancelled and the stock was updated
        DefaultTableModel model = (DefaultTableModel) processOrder.table2.getModel();
        assertEquals("Cancelled", model.getValueAt(1, 3));
        assertEquals(7, model.getValueAt(1, 2));
        JOptionPane pane = (JOptionPane) SwingUtilities.getAncestorOfClass(JOptionPane.class, ProductTableView);
        assertEquals("Order Cancelled!", pane.getMessage());
    }
}

