package org.theGildedBottle;

import com.formdev.flatlaf.FlatDarkLaf;

import javax.imageio.ImageIO;
import javax.swing.*;
import javax.swing.plaf.metal.MetalLookAndFeel;
import javax.swing.plaf.nimbus.NimbusLookAndFeel;
import javax.swing.plaf.synth.SynthLookAndFeel;
import java.awt.*;
import java.text.ParseException;
import java.util.Objects;

import static javax.swing.UIManager.*;

public class MainFrame extends JFrame {
    //JFrame window;
    static int WIDTH = 960;
    static int HEIGHT = 640;

    DbCon Con =  new DbCon();

    public MainFrame(String title) throws UnsupportedLookAndFeelException, ParseException {
        super(title);
        UIManager.setLookAndFeel(new FlatDarkLaf());
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(new Dimension(WIDTH, HEIGHT));
        this.setIconImage(new ImageIcon("src/resources/logo.png").getImage());
        this.setResizable(false);
        this.setVisible(true);
    }
}