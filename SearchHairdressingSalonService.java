package com.dreamwedding.salons;
 
import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;
import java.net.URLEncoder;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
 
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
 
@Path("/searchSalon")
public class SearchHairdressingSalonService {
 
	@Path("{s}")
	@GET
	@Produces("application/json")
	public Response searchSalon(@PathParam("s") String s) throws SQLException, ClassNotFoundException, UnsupportedEncodingException {
 
		//s = URLDecoder.decode(s, "UTF-8");
		s = s.replace("+", " ");
		s = s.replace("&submitSearch=", "");
		JSONArray jsonArray = new JSONArray();
		
		Class.forName("com.mysql.jdbc.Driver");
		
		String url = "jdbc:mysql://localhost:3306/dreamweddingdatabase";
		String username = "root";
		String password = "Secret123!";
		
		Connection conn = DriverManager.getConnection(url, username, password);
		
	    PreparedStatement pst = conn.prepareStatement("SELECT * FROM hairdressingsalons WHERE name=?");
	    pst.setString(1, s);
	    ResultSet rs = pst.executeQuery();
	    
	    
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
	    }else{
	    	//return something when no data is displayed in db
	    	return Response.status(200).entity("").build();
	    }
	    
	    
	    pst.close();

	    jsonArray.put(jsonObject);
	    String result = jsonArray.toString();
	      
	    return Response.status(200).entity(result).build();
	}
}