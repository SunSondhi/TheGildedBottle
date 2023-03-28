package org.theGildedBottle;

import at.favre.lib.crypto.bcrypt.BCrypt;

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
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
        loginButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {


            PreparedStatement checkLoginCredentials = null;
            ResultSet resultSet = null;

            try {
                Connection con = DbCon.getConnection();
                String email = emailField.getText();
                String password = passwordField.getText();
                // Query user
                checkLoginCredentials = con.prepareStatement("SELECT password, role FROM users WHERE email = ?;");
                checkLoginCredentials.setString(1, email);

                resultSet = checkLoginCredentials.executeQuery();


                // If user does not exist then display an error
                if(!resultSet.isBeforeFirst()) {
                    String message  = "Incorrect login credentials please try again.";
                    JOptionPane.showMessageDialog(null, message, "Login credentials errors", JOptionPane.WARNING_MESSAGE);

                    return;
                }

                resultSet.next();
                String retrievedPassword = resultSet.getString("password");
                int retrievedType = resultSet.getInt("role");

                BCrypt.Verifyer v = BCrypt.verifyer();

                // Check password by comparing the entered password to the password from the database
                if(!v.verify(password.toCharArray(), retrievedPassword.toCharArray()).verified) {
                    String message  = "Incorrect login credentials please try again.";
                    JOptionPane.showMessageDialog(null, message, "Login credentials errors", JOptionPane.WARNING_MESSAGE);
                    return;
                }

                // Check role
                if(retrievedType != 1) {
                    String message = "You are not an admin. Please contact an administrator to upgrade your role.";
                    JOptionPane.showMessageDialog(null, message, "Not Admin", JOptionPane.WARNING_MESSAGE);
                    return;
                }
                System.out.println("logged in");
                loginButton.addActionListener(cM);
                loginButton.setActionCommand("Homepage");

            } catch (SQLException i) {
               i.printStackTrace();
            } catch(Exception x) {
               x.printStackTrace();
            }
            }

        });


    }
}
