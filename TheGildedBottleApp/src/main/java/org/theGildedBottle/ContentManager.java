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
    public ContentManager(@NotNull JFrame window, JPanel startPanel) {
        cL = new CardLayout();
        this.window = window;
        contentPanel = new JPanel();
        contentPanel.setLayout(cL);
        currentPanel = startPanel;
        window.add(contentPanel);
        contentPanel.add(currentPanel);
    }

    public void ChangeScene(@NotNull JPanel nextPanel) {
        contentPanel.remove(currentPanel);
        currentPanel = nextPanel;
        contentPanel.add(currentPanel);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        contentPanel.remove(currentPanel);
        contentPanel.add(new ProductPanel());
        contentPanel.revalidate();
    }
}
