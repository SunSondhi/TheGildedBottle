package org.theGildedBottle;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class MainFrame extends JFrame {
    JFrame window;
    JPanel panel;
    int minWidth = 960;
    int minHeight = 640;
    Color backgroundColour = Color.darkGray;

    DbCon Con =  new DbCon();

    public MainFrame(String title) {
        //Frame creation
        window = new JFrame(title);
        window.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        window.setMinimumSize(new Dimension(minWidth, minHeight));
        window.setVisible(true);
        //Panel creation
        panel = new JPanel();
        panel.setBackground(backgroundColour);
        //attaching panel to window
        window.add(panel);


        //button
        JButton btn = new JButton("Insert into table");
        btn.setBounds(100,100,100,40);
        // action on click, Con is the obj for DbCon class
        btn.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                Con.setQueryInput();
            }
        });
        panel.add(btn);
        panel.setSize(300,300);
        panel.setLayout(null);
        panel.setVisible(true);




    }

}