package org.theGildedBottle;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.sql.*;
import org.mindrot.jbcrypt.BCrypt;

import static org.theGildedBottle.DbCon.con;

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
                    String sql = "SELECT * FROM users WHERE email = ?";
                    PreparedStatement stmt = con.prepareStatement(sql);
                    stmt.setString(1, userEmail);
                    ResultSet result = stmt.executeQuery();

                    if (result.next()) {
                        String storedHash = result.getString("password");

                        // Check if the password matches the stored hash
                        if (BCrypt.checkpw(password, storedHash)) {
                            // Password is correct, log in the user
                            System.out.println("Logged in successfully");
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
                } finally {
                    try {
                        if (con != null) {
                            con.close(); // Close the connection
                        }
                    } catch (SQLException ex) {
                        ex.printStackTrace();
                    }
                }
            }
        });
    }
}
