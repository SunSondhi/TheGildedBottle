package org.theGildedBottle;

import javax.swing.*;

public class HomePage {
    protected JPanel homePage;
    private JButton addProductButton;
    private JButton deleteProductButton;
    private JButton tableviewbutton;
    private JButton viewPurchasesButton;


    public HomePage(ContentManager cM) {
//go to add product page
        addProductButton.addActionListener(cM);
        addProductButton.setActionCommand("ProductsPage");
//        go to delete product page



//        go to table view
        tableviewbutton.addActionListener(cM);
        tableviewbutton.setActionCommand("ProductList");


//        go to purchases table
        viewPurchasesButton.addActionListener(cM);
        viewPurchasesButton.setActionCommand("PurchasesList");
    }
}
