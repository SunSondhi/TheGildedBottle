package org.theGildedBottle;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.*;

public class LoginPage {
    private JTextField emailField;
    private JPasswordField passwordField;
    private JButton loginButton;
    private JLabel emailLabel;
    private JLabel passwordLabel;
    public JPanel loginPage;

    public static DbCon Con = new DbCon();
    private Statement stmt;

    public LoginPage(ContentManager cM) {

        loginPage.setBackground(ContentManager.BACKGROUND_COLOUR);
        loginButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String userEmail = emailField.getText();
                String password = passwordField.getText();
                Connection con = null;

                try {
                    con = DbCon.getConnection();
                    String sql = "SELECT * FROM app_user WHERE email = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);
                    stmt.setString(1, userEmail);
                    ResultSet result = stmt.executeQuery();

                    if (result.next()) {
                        String storedPassword = result.getString("password");

                        // Check if the password matches the stored hash
                        if (password.equals(storedPassword)) {
                            // Password is correct, log in the user
                            loginButton.addActionListener(cM);
                            loginButton.setActionCommand("Homepage");
                        } else {
                            // Password is incorrect, show error message
                            System.out.println("Incorrect password");
                        }
                    } else {
                        // User not found, show error message
                        System.out.println("User not found");
                    }

                } catch (Exception ex) {
                    ex.printStackTrace();
                }
            }
        });
    }
}
