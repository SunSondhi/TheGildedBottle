package org.theGildedBottle;

import javax.swing.*;
import java.awt.*;

public class MainFrame extends JFrame {
    //JFrame window;
    static int WIDTH = 960;
    static int HEIGHT = 640;

    DbCon Con =  new DbCon();

    public MainFrame(String title) {
        super(title);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(new Dimension(WIDTH, HEIGHT));
        this.setResizable(false);
        this.setVisible(true);
    }
}