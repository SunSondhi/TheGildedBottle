package org.theGildedBottle;
import at.favre.lib.crypto.bcrypt.BCrypt;
import org.jetbrains.annotations.NotNull;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class ContentManager implements ActionListener {
    JFrame window;
    public static Dimension TEXT_FIELD_SIZE = new Dimension(300,30);
    //public static Color TEXT_COLOUR = Color.white;
    public static Color BACKGROUND_COLOUR = Color.darkGray;

    public ContentManager (@NotNull JFrame window) {
        this.window = window;
        window.setContentPane(new LoginPage(this).loginPage);
        window.revalidate();
    }


    @Override //this is going to be the sole action listener so all authentication will happen in here
    public void actionPerformed(ActionEvent e) {
        String command = e.getActionCommand();
        if (command.equals("Login")) {
            // Authenticate, if authenticated then swap to Product panel, pass on user instance maybe?

            window.setContentPane(new ProductPage(this).productsPanel);
            window.revalidate();

        }
        if (command.equals("Logout")) {
            window.setContentPane(new LoginPage(this).loginPage);
            window.revalidate();
        }
    }
}
