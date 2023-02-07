
import java.sql.* ;  // for standard JDBC programs
import java.math.* ; // for BigDecimal and BigInteger support
import java.util.ArrayList;

public class DbCon {

    public static void main(String[] args) throws SQLException{
        String userName = "u-210097072"; //username of the database
        String password = "fUrtsPkGskwLxRU"; //password of the database
        String url = "jdbc:mysql://cs2410-web01pvm.aston.ac.uk/u_210097072_db"; //the url of the database
        String query = "select * from users"; // simple query

//        this try catches if there is no driver meaning no connections
        try{
            Class.forName("com.mysql.jdbc.Driver");
        }catch(ClassNotFoundException e){
            e.printStackTrace();
        }
//      this is for sql connections
        try {

            Connection conn = DriverManager.getConnection(url,userName,password); //connecting

            Statement statement = conn.createStatement(); //creating a statement

            ResultSet result = statement.executeQuery(query); //execute the query and deliver as result

            while(result.next()){
                ArrayList<String> data = new ArrayList<String>();
                for(int i = 1; i < 8; i++){
                    data.add(result.getString(i));
                }
                System.out.println(data);
            }

        }catch (SQLException e){
            e.printStackTrace();
        }
    }



}
