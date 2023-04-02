package org.theGildedBottle;

import javax.swing.*;
import java.text.ParseException;

public class Main {
    public static void main(String[] args) throws UnsupportedLookAndFeelException, ParseException {
        new ContentManager(new MainFrame("The Gilded Bottle Application")); //Entry point to the GUI
    }
}