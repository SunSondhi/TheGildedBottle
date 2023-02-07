package org.theGildedBottle;

import javax.swing.*;
import java.awt.*;

public class MainFrame {
    JFrame window;
    JPanel panel;
    int minWidth = 960;
    int minHeight = 640;
    Color backgroundColour = Color.darkGray;

    public MainFrame (String title) {
        //Frame creation
        window = new JFrame(title);
        window.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        window.setMinimumSize(new Dimension(minWidth, minHeight));
        window.setVisible(true);
        //Panel creation
        panel = new JPanel();
        panel.setBorder(BorderFactory.createEmptyBorder(25,25,25,25));
        panel.setBackground(backgroundColour);
        //attaching panel to window
        window.add(panel);
    }

    //Adding the main components is done through methods here


}
