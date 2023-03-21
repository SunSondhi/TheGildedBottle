package org.theGildedBottle;

import javax.swing.*;

public class HomePage {
    JPanel homePage;
    JButton addProductButton;
    JButton UpdateStockButton;
    JButton TableViewButton;
    JButton viewPurchasesButton;

    JButton processOrdersButton;


    public HomePage(ContentManager cM) {
//go to add product page
        addProductButton.addActionListener(cM);
        addProductButton.setActionCommand("ProductsPage");
//        go to delete product page
        UpdateStockButton.addActionListener(cM);
        UpdateStockButton.setActionCommand("UpdateStock");
//        go to table view
        TableViewButton.addActionListener(cM);
        TableViewButton.setActionCommand("ProductList");
//        go to purchases table
        viewPurchasesButton.addActionListener(cM);
        viewPurchasesButton.setActionCommand("PurchasesList");

        processOrdersButton.addActionListener(cM);
        processOrdersButton.setActionCommand("ProcessOrder");
    }
}
