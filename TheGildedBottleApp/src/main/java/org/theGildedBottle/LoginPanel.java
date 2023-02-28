package org.theGildedBottle;
import java.awt.*;
import javax.swing.*;

public class LoginPanel extends JPanel{
    ContentManager cM;
    JTextField email;
    JLabel emailLabel, passwordLabel, sneakyBuffer;
    JPasswordField password;
    JButton submitButton;
    LayoutManager manager = new GridBagLayout();


    public LoginPanel(ContentManager c) {
        super();
        cM = c;
        sneakyBuffer = new JLabel("    ");
        this.setBackground(ContentManager.BACKGROUND_COLOUR);
        this.setLayout(manager);
        this.add(EmailLabel()); // labels first so that they're to the left of the text boxes
        this.add(Email());
        this.add(PasswordLabel());
        this.add(Password());
        this.add(sneakyBuffer);
        this.add(SubmitButton());
        submitButton.setVisible(true);
        this.setVisible(true);
    }

    private JTextField Email() {
        email = new JTextField(10);
        email.setLayout(manager);
        email.setVisible(true);
        return email;
    }

    private JLabel EmailLabel() {
        emailLabel = new JLabel("    E-mail address  ");
        emailLabel.setLabelFor(email);
        return emailLabel;
    }

    private JPasswordField Password() {
        password = new JPasswordField(10);
        password.setActionCommand("Login");
        password.addActionListener(cM);
        password.setVisible(true);
        return password;
    }

    private JLabel PasswordLabel() {
        passwordLabel = new JLabel("     Password  ");
        passwordLabel.setLabelFor(password);
        return passwordLabel;
    }
    private JButton SubmitButton () {
        submitButton = new JButton("Submit");
        submitButton.setActionCommand("Login");
        submitButton.addActionListener(cM);
        return submitButton;
    }
}
