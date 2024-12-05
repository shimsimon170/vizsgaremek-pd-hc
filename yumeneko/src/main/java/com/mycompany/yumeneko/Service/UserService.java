/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Service;

import com.mycompany.yumeneko.Config.JWT;
import com.mycompany.yumeneko.Model.Customers;
import org.json.JSONObject;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 *
 * @author patak
 */
public class UserService {
    private Customers layer = new Customers();
    private static final String EMAIL_REGEX = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$";

    public static boolean isValidEmail(String email) {
        Pattern pattern = Pattern.compile(EMAIL_REGEX);
        Matcher matcher = pattern.matcher(email);
        return matcher.matches();
    }

    public JSONObject login(String email, String password) {
        JSONObject toReturn = new JSONObject();
        String status = "success";
        int statusCode = 200;

        if (isValidEmail(email)) {
            Customers modelResult = layer.login(email, password);

            if (modelResult == null) {
                status = "modelException";
                statusCode = 500;
            } else {
                if (modelResult.getId() == null) {
                    status = "userNotFound";
                    statusCode = 417;
                } else {
                    JSONObject result = new JSONObject();
                    result.put("id", modelResult.getId());
                    result.put("email", modelResult.getEmail());
                    result.put("firstName", modelResult.getName());
                    result.put("isAdmin", modelResult.getIsAdmin());
                    result.put("isDeleted", modelResult.getIsDeleted());
                    result.put("jwt", JWT.createJWT(modelResult));

                    toReturn.put("result", result);
                }
            }

        } else {
            status = "invalidEmail";
            statusCode = 417;
        }

        toReturn.put("status", status);
        toReturn.put("statusCode", statusCode);
        return toReturn;
    }
 public JS0N0bject registerUser(Customers u){
     JS0N0bject toReturn = new JS0N0bject();
     String status = "sucess";
     int statusCode =200;
     
     
     if (isValidEmail(u.getEmail())){
         if (isValidPassword(u.getPassword())){
             boolean userIsExsits = User.isuserExists(u.getEmail())
         }
     }
     
     toReturn.put("status",status);
     toReturn.put("statusCode",statusCode);
     return toReturn;
 }
}
