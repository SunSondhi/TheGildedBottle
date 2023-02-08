package org.theGildedBottle;
import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class LoginPanel implements ActionListener{

    MainFrame window;
    JTextField emailField;
    JPasswordField passwordField;
    JButton submitButton;
    //I have a plan for this, couple things need figuring out but the content manager will deal with swapping "scenes" (panels)
    public LoginPanel() {
        //this.window = window;
        //window.add(buildPanel());
        buildPanel();
    }

    private JPanel buildPanel () {
        JPanel loginPanel = new JPanel();
        loginPanel.add(emailInput());
        loginPanel.add(passwordInput());
        loginPanel.add(SubmitButton());
        emailField.setVisible(true);
        passwordField.setVisible(true);
        submitButton.setVisible(true);
        return loginPanel;
    }

    private JTextField emailInput() {
        emailField = new JTextField("E-mail address");
        return emailField;
    }

    private JPasswordField passwordInput() {
        passwordField = new JPasswordField("Password");
        passwordField.setActionCommand("Submit");
        passwordField.addActionListener(this);
        return passwordField;
    }

    private JButton SubmitButton () {
        submitButton = new JButton();
        submitButton.setActionCommand("Submit");
        return submitButton;
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        //authentication is to be added here!
    }
}
