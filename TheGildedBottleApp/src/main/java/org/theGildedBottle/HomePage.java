package org.theGildedBottle;

import javax.swing.*;

public class HomePage {
    JPanel homePage;
    JButton addProductButton;
    JButton UpdateStockButton;
    JButton TableViewButton;
    JButton viewPurchasesButton;

    JButton processOrdersButton;
    private JButton pdfButton;
    private JButton logoutButton;
    private JButton searchProductButton;


    public HomePage(ContentManager cM) {
//go to add product page
        this.addProductButton.addActionListener(cM);
        this.addProductButton.setActionCommand("ProductsPage");
//        go to delete product page
        this.UpdateStockButton.addActionListener(cM);
        this.UpdateStockButton.setActionCommand("UpdateStock");
//        go to table view
        this.TableViewButton.addActionListener(cM);
        this.TableViewButton.setActionCommand("ProductList");
//        go to purchases table
        this.viewPurchasesButton.addActionListener(cM);
        this.viewPurchasesButton.setActionCommand("PurchasesList");

        this.processOrdersButton.addActionListener(cM);
        this.processOrdersButton.setActionCommand("ProcessOrder");
//        generate pdf
        this.pdfButton.addActionListener(cM);
        this.pdfButton.setActionCommand("PDF");

        this.searchProductButton.addActionListener(cM);
        this.searchProductButton.setActionCommand("SearchProd");

        this.logoutButton.addActionListener(cM);
        this.logoutButton.setActionCommand("Logout");


    }
}
