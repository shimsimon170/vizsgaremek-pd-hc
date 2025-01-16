/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Service;

import com.mycompany.yumeneko.Config.JWT;
import com.mycompany.yumeneko.Model.Customers;
import java.util.List;
import org.json.JSONObject;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import org.json.JSONArray;

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
    
    public static boolean isValidPassword(String password) {
        if (password.length() < 8) {
            return false;
        }

        boolean hasNumber = false;
        boolean hasUpperCase = false;
        boolean hasLowerCase = false;
        boolean hasSpecialChar = false;
        
        for(char c : password.toCharArray()) {
            if (Character.isDigit(c)) {
                hasNumber = true;
            } else if (Character.isUpperCase(c)) {
                hasUpperCase = true;
            } else if (Character.isLowerCase(c)) {
                hasLowerCase = true;
            } else if ("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@#$%^&+=!])(?=.*[\\S]).{8,}$".indexOf(c) != -1) {
                hasSpecialChar = true;
            }
        }

        return hasNumber && hasUpperCase && hasLowerCase && hasSpecialChar;
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
                    result.put("name", modelResult.getName());
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
    
    public JSONObject registerUser(Customers u) {
        JSONObject toReturn = new JSONObject();
        String status = "success";
        int statusCode = 200;
        
        if(isValidEmail(u.getEmail())) {
            if(isValidPassword(u.getPassword())) {
                boolean userIsExists = Customers.isUserExists(u.getEmail());
                if(Customers.isUserExists(u.getEmail()) == null) {
                    status = "ModelException";
                    statusCode = 500;
                }else if(userIsExists == true) {
                    status = "UserAlreadyExists";
                    statusCode = 417;
                } else {
                    boolean registerUser = layer.registerUser(u);
                    if(registerUser == false) {
                        status = "fail";
                        statusCode = 417;
                    }
                }
            } else {
                status = "invalidPassword";
                statusCode = 417;
            }
        } else {
            status = "invalidEmail";
            statusCode = 417;
        }
        
        toReturn.put("status", status);
        toReturn.put("statusCode", statusCode);
        return  toReturn;
    }
    
    public JSONObject registerAdmin(Customers u, String jwr) {
        JSONObject toReturn = new JSONObject();
        String status = "success";
        int statusCode = 200;
        if (JWT.isAdmin(jwr)) {
            if(isValidEmail(u.getEmail())) {
                if(isValidPassword(u.getPassword())) {
                    boolean userIsExists = Customers.isUserExists(u.getEmail());
                    if(Customers.isUserExists(u.getEmail()) == null) {
                        status = "ModelException";
                        statusCode = 500;
                    }else if(userIsExists == true) {
                        status = "UserAlreadyExists";
                        statusCode = 417;
                    } else {
                        boolean registerAdmin = layer.registerAdmin(u);
                        if(registerAdmin == false) {
                            status = "fail";
                            statusCode = 417;
                        }
                    }
                } else {
                    status = "invalidPassword";
                    statusCode = 417;
                }
            } else {
                status = "invalidEmail";
                statusCode = 417;
            }
        }else{
            status="permissionError";
           statusCode = 417;
                    
        }
        
        toReturn.put("status", status);
        toReturn.put("statusCode", statusCode);
        return  toReturn;
    }
        public JSONObject getAllUser(){
            JSONObject toReturn = new JSONObject();
            String status = "success";
            int statusCode = 200;
            List<Customers> modelResult=layer.getAllUser();
            if (modelResult==null) {
                status="Modelexception";
                statusCode=500;
            }else if(modelResult.isEmpty()){
                status="NoUsersFound";
                statusCode=417;
            }else{
                JSONArray result =new JSONArray();
                for(Customers actualUser : modelResult){
                    JSONObject toAdd = new JSONObject();
                    toAdd.put("id", actualUser.getId());
                    toAdd.put("email", actualUser.getEmail());
                    toAdd.put("firstName", actualUser.getName());
                    toAdd.put("isAdmin", actualUser.getIsAdmin());
                    toAdd.put("isDeleted", actualUser.getIsDeleted());
                    toAdd.put("createdAt", actualUser.getCreatedAt());
                    toAdd.put("deletedAt", actualUser.getDeletedAt());
                    
                    result.put(toAdd);
                }
                toReturn.put("result", result);
            }
            
            toReturn.put("status", status);
            toReturn.put("statusCode", statusCode);
            return  toReturn;
    }
     public JSONObject getUserById(Integer id){
         JSONObject toReturn = new JSONObject();
           String status = "success";
            int statusCode = 200;
            
            Customers modelResult = new Customers(id);
            
            if(modelResult.getEmail() == null){
                status = "UserNotFound";
                statusCode = 417;
            }else{
                JSONObject user = new JSONObject();
                user.put("id", modelResult.getId());
                user.put("email", modelResult.getEmail());
                user.put("phone", modelResult.getPhoneNumber());
                user.put("firstName", modelResult.getName());
                user.put("isAdmin", modelResult.getIsAdmin());
                user.put("isDeleted", modelResult.getIsDeleted());
                user.put("createdAt", modelResult.getCreatedAt());
                
                toReturn.put("result", user);
            }
            
            toReturn.put("status", status);
            toReturn.put("statusCode", statusCode);
            return  toReturn;
     }  
     
     public JSONObject changePassword(Integer userId, String newPassword, Integer creator){
         JSONObject toReturn = new JSONObject();
           String status = "success";
            int statusCode = 200;
            
            if(userId == creator){
                Boolean modelResult = layer.changePassword(userId, newPassword, creator);
                if(!modelResult){
                    status = "ModelException";
                    statusCode = 500;
                }
            }else{
                status = "PermissionError";
                statusCode = 417;
            }
            
            toReturn.put("status", status);
            toReturn.put("statusCode", statusCode);
            return  toReturn;
     }
}
