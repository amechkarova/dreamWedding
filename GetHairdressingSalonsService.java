package com.dreamwedding.salons;
 
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

/**
 * @author Crunchify, LLC
 * Description: This program converts unit from Fahrenheit to Centigrade.
 * 
 */
 
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
 
@Path("/getSalons")
public class GetHairdressingSalonsService {
 
	@GET
	@Produces("application/json")
	public Response getSalons() throws ClassNotFoundException, SQLException{
 
		Class.forName("com.mysql.jdbc.Driver");
		
		String url = "jdbc:mysql://localhost:3306/dreamweddingdatabase";
		String username = "root";
		String password = "Secret123!";

		
		Connection conn = DriverManager.getConnection(url, username, password);
		String query = "SELECT * FROM hairdressingsalons";

	    // create the java statement
	    Statement st = conn.createStatement();
	      
	    // execute the query, and get a java resultset
	    ResultSet rs = st.executeQuery(query);
	      
	    //JSONObject jsonObjectBig = new JSONObject();
	    JSONArray jsonArray = new JSONArray();
	    // iterate through the java resultset
	    while(rs.next()){
	    	JSONObject jsonObject = new JSONObject();
	    	int id = rs.getInt("id");
		    String name = rs.getString("name");
		    String address = rs.getString("address");
		    String telephone = rs.getString("telephone");
		    String email = rs.getString("email");
		    String workingHours = rs.getString("workingHours");
		    String manicure = rs.getString("manicure");
		    String pedicure = rs.getString("pedicure");
		    String makeup = rs.getString("makeup");
		    String description = rs.getString("description");
		    String img = rs.getString("img");
		    
		    jsonObject.put("id", id);
		    jsonObject.put("name", name);
		    jsonObject.put("address", address);
		    jsonObject.put("telephone", telephone);
		    jsonObject.put("email", email);
		    jsonObject.put("workingHours", workingHours);
		    jsonObject.put("manicure", manicure);
		    jsonObject.put("pedicure", pedicure);
		    jsonObject.put("makeup", makeup);
		    jsonObject.put("description", description);
		    jsonObject.put("img", img);
		    
		    jsonArray.put(jsonObject);
		    //jsonArray.put(jsonObject);
	    }
	    
	    //jsonObjectBig.put("arr", jsonArray);
	    
	    st.close();
	    
	    //String result = "yes " + jsonArray.getJSONObject(0);
	    String result = jsonArray.toString();
	      
	    return Response.status(200).entity(result).build();
	 }

}
		
//		System.out.println("Connecting database...");
//
//		try (Connection connection = DriverManager.getConnection(url, username, password)) {
//		    System.out.println("Database connected!");
//		} catch (SQLException e) {
//		    throw new IllegalStateException("Cannot connect the database!", e);
//		}
//		
//		JSONObject jsonObject = new JSONObject();
//		jsonObject.put("test", 200);
//		String result = "Database connected!" + jsonObject;
//		
//		return Response.status(200).entity(result).build();
//		JSONObject jsonObject = new JSONObject();
//		Double fahrenheit = 98.24;
//		Double celsius;
//		celsius = (fahrenheit - 32) * 5 / 9;
//		jsonObject.put("F Value", fahrenheit);
//		jsonObject.put("C Value", celsius);
// 
//		String result = "@Produces(\"application/json\") Output: \n\nF to C Converter Output: \n\n" + jsonObject;
//		return Response.status(200).entity(result).build();
	//}