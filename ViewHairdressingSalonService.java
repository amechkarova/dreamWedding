package com.dreamwedding.salons;
 
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

/**
 * @author Crunchify.com
 * * Description: This program converts unit from Centigrade to Fahrenheit.
 * Last updated: 12/28/2018
 */
 
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
 
@Path("/viewSalon")
public class ViewHairdressingSalonService {
 
	@Path("{i}")
	@GET
	@Produces("application/json")
	public Response viewSalon(@PathParam("i") int i) throws SQLException, ClassNotFoundException {
 
		Class.forName("com.mysql.jdbc.Driver");
		
		String url = "jdbc:mysql://localhost:3306/dreamweddingdatabase";
		String username = "root";
		String password = "Secret123!";
		
		Connection conn = DriverManager.getConnection(url, username, password);
		
	    // create the java statement
	    PreparedStatement pst = conn.prepareStatement("SELECT * FROM hairdressingsalons WHERE id=?");
	    pst.setInt(1, i);
	    // execute the query, and get a java resultset
	    ResultSet rs = pst.executeQuery();
	    
	    JSONArray jsonArray = new JSONArray();
	    JSONObject jsonObject = new JSONObject();
	    
	    if(rs.next()){
	    	
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
	    } 
	    
	    pst.close();

	    jsonArray.put(jsonObject);
	    String result = jsonArray.toString();
	      
	    return Response.status(200).entity(result).build();
	}
}