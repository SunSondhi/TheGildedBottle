package org.theGildedBottle;

import com.jcraft.jsch.JSch;
import com.jcraft.jsch.JSchException;
import com.jcraft.jsch.Session;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DbCon {

    protected static Connection con=null;
    static Session session = null;

    public static Connection getConnection() {
        // Connect to database if not already connected
        try {
            session = new JSch().getSession("u-210097072", "cs2410-web01pvm.aston.ac.uk", 22);
            session.setPassword("xJC9YOv8bHrTadNW");
            session.setConfig("StrictHostKeyChecking", "no");
            session.connect();

            // Forward local port to the database server
            int assignedPort = session.setPortForwardingL(0, "localhost", 3306);
            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection(
                        "jdbc:mysql://localhost:" + assignedPort + "/u_210097072_thegildedbottle",
                        "u-210097072",
                        "fUrtsPkGskwLxRU"
                );

            }catch (SQLException  E){
                E.printStackTrace();
            }

            System.out.println(session.isConnected());


        } catch (JSchException | ClassNotFoundException e) {
            e.printStackTrace();
        }
        return con;
    }

}
