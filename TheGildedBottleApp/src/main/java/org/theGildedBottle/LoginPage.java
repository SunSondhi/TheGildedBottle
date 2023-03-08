package org.theGildedBottle;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class LoginPage {
    private JTextField emailField;
    private JPasswordField passwordField;
    private JButton loginButton;
    private JLabel emailLabel;
    private JLabel passwordLabel;
    public JPanel loginPage;
    public LoginPage(ContentManager cM) {
        loginPage.setBackground(ContentManager.BACKGROUND_COLOUR);
        loginButton.setActionCommand("Login");
        loginButton.addActionListener(cM);
    }
}
