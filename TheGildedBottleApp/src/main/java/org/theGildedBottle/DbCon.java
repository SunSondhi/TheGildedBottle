package org.theGildedBottle;

import java.sql.*;
import java.util.ArrayList;
import java.util.Scanner;


public class DbCon {

    public static String queryInput;

    private static Connection con;



    public static Connection getConnection() {
        // Connect to database if not already connected
        if (con == null) {
            try {
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection(
                        "jdbc:mysql://localhost:3306/thegildedbottle",
                        "root",
                        ""
                );
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
        // Return connection object
        return con;
    }



    public void setQueryInput(){
        //input from user for query
        Scanner myObj = new Scanner(System.in);


        // Enter query and press Enter
        System.out.println("Enter query");
        queryInput = myObj.nextLine();
    }




    public static void main(String[] args) throws SQLException {
        String userName = "root"; //username of the database
        String password = ""; //password of the database
        String url = "jdbc:mysql://localhost:3306/laravel"; //the url of the database





        String query = queryInput; // simple query

//        this try catches if there is no driver meaning no connections
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
//      this is for sql connections
        try {

            Connection conn = DriverManager.getConnection(url, userName, password); //connecting

            Statement statement = conn.createStatement(); //creating a statement

            //when using statement.execute query we only retrieve results
//            ResultSet result = statement.executeQuery(query); //execute the query and deliver as result
//
//            while (result.next()) {
//                ArrayList<String> data = new ArrayList<String>();
//                for (int i = 1; i < 8; i++) {
//                    data.add(result.getString(i));
//                }
//                System.out.println(data);
//            }
//

            DbCon c = new DbCon();
            c.setQueryInput();
            //here instead is when we want to UPDATE, INSERT and DELETE, but they way i did it is to insert from terminal
            int result = statement.executeUpdate(queryInput);

            if (result > 0)
                System.out.println("successfully inserted");

            else
                System.out.println(
                        "unsucessful insertion ");

            conn.close(); //always close the connection to the DB

        } catch (SQLException e) {
            e.printStackTrace();
        }


    }


}
