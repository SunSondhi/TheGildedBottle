package org.theGildedBottle;
import org.jetbrains.annotations.NotNull;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class ContentManager implements ActionListener { //using the content manager to manage the javax.swing Card Layout system in a way that works for our use case
    JPanel contentPanel;
    JPanel currentPanel;
    CardLayout cL;
    JFrame window;
    public static Dimension TEXT_FIELD_SIZE = new Dimension(300,30);
    //public static Color TEXT_COLOUR = Color.white;
    public static Color BACKGROUND_COLOUR = Color.gray;

    public ContentManager (@NotNull JFrame window) {
        cL = new CardLayout();
        this.window = window;
        contentPanel = new JPanel();
        contentPanel.setLayout(cL);
        currentPanel = new LoginPanel(this);
        this.window.add(contentPanel);
        contentPanel.add(currentPanel);
        window.setVisible(true);
    }

    /*
    public void ChangeScene(@NotNull JPanel nextPanel) {
        contentPanel.remove(currentPanel);
        currentPanel = nextPanel;
        contentPanel.add(currentPanel);
    } */

    @Override //this is going to be the sole action listener so all authentication will happen in here
    public void actionPerformed(ActionEvent e) {
        String command = e.getActionCommand();
        if (command.equals("Login")) {
            // Authenticate, if authenticated then swap to Product panel, pass on user instance maybe?
        contentPanel.remove(currentPanel);
        currentPanel = new ProductPanel(this);
        contentPanel.add(currentPanel);
        contentPanel.revalidate();
        }

    }
}
