package org.theGildedBottle;

import javax.swing.*;
import java.awt.*;

public class MainFrame extends JFrame {
    //JFrame window;
    int minWidth = 960;
    int minHeight = 640;

    DbCon Con =  new DbCon();

    public MainFrame(String title) {
        super(title);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setMinimumSize(new Dimension(minWidth, minHeight));
        this.setVisible(true);
//        //Panel creation
//        /*panel = new JPanel();
//        panel.setBackground(backgroundColour);
//        //attaching panel to window
//        window.add(panel);
//
//
//        //button
//        JButton btn = new JButton("Insert into table");
//        btn.setBounds(100,100,100,40);
//        // action on click, Con is the obj for DbCon class
//        btn.addActionListener(new ActionListener() {
//            public void actionPerformed(ActionEvent e) {
//                Con.setQueryInput();
//            }
//        });
//        panel.add(btn);
//        panel.setSize(300,300);
//        panel.setLayout(null);
//        panel.setVisible(true);
//
//*/
    }
}