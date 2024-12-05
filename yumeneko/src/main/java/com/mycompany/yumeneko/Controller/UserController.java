/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Controller;

import com.mycompany.yumeneko.Model.Customers;
import com.mycompany.yumeneko.Service.UserService;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.DefaultValue;
import javax.ws.rs.Produces;
import javax.ws.rs.GET;
import javax.ws.rs.HeaderParam;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import org.json.JSONObject;
/**
 *
 * @author patak
 */
    @Path("customer")
public class UserController {

    @Context
    private UriInfo context;
    private UserService layer = new UserService();

    public UserController() {
    }

    @GET
    @Produces(MediaType.APPLICATION_XML)
    public String getXml() {
        throw new UnsupportedOperationException();
    }
    
    @PUT
    @Consumes(MediaType.APPLICATION_XML)
    public void putXml(String content) {
    }
    
    @POST
    @Path("login")
    @Consumes(MediaType.APPLICATION_JSON)
    public Response login(String bodyString){
        JSONObject body = new JSONObject(bodyString);
        
         Customers u = new Customers(
                body.getString("email"),
                body.getString("phoneNumber"),
                body.getString("name"),
                body.getString("password")
        );
        
        JSONObject obj = layer.login(body.getString("email"), body.getString("password"));
        return Response.status(obj.getInt("statusCode")).entity(obj.toString()).type(MediaType.APPLICATION_JSON).build();
    }
}
