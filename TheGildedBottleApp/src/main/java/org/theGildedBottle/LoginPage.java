package org.theGildedBottle;

import javax.swing.*;
import java.sql.*;

public class LoginPage {
     JTextField emailField;
     JPasswordField passwordField;
     JButton loginButton;
     JLabel emailLabel;
     JLabel passwordLabel;
     JPanel loginPage;

    public static DbCon Con = new DbCon();
    private Statement stmt;

    public LoginPage(ContentManager cM) {
        loginButton.addActionListener(cM);
        loginButton.setActionCommand("Homepage");

    }
}
