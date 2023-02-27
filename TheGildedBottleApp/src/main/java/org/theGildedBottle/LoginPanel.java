package org.theGildedBottle;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class LoginPanel extends JPanel{
    ContentManager cM;
    JTextField emailField;
    JPasswordField passwordField;
    JButton submitButton;
    public LoginPanel(ContentManager c) {
        super();
        cM = c;
        this.setBackground(Color.blue);
        this.add(emailInput());
        this.add(passwordInput());
        this.add(SubmitButton());
        emailField.setVisible(true);
        passwordField.setVisible(true);
        submitButton.setVisible(true);
        this.setVisible(true);
    }


    private JTextField emailInput() {
        emailField = new JTextField("E-mail address");
        return emailField;
    }

    private JPasswordField passwordInput() {
        passwordField = new JPasswordField("Password");
        passwordField.setActionCommand("Submit");
        passwordField.addActionListener(cM);
        return passwordField;
    }

    private JButton SubmitButton () {
        submitButton = new JButton();
        submitButton.setActionCommand("Submit");
        submitButton.addActionListener(cM);
        return submitButton;
    }
}
