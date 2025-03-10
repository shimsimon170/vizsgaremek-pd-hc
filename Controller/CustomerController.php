<?php

require_once __DIR__ . "/../Service/CustomerService.php";
require_once 'Request.php';
require_once 'Response.php';

class CustomerController{

    public static function registerCustomer(Request $request) {

        $data = CustomerService::registerCustomer();
        if($data){
            $response = [
                "status" => "success",
                "statusCode" => 200,
                "message" => "success",
                "body" => $data
            ];
        }else{
            $response = [
                "status" => "error",
                "statusCode" => 500,
                "message" => "Error during registration.",
            ];
        }
        
        return $response;
    }

    public static function login(Request $request) {
        $data = CustomerService::login();
        if($data){
            $response = [
                "status" => "success",
                "statusCode" => 200,
                "message" => "success",
                "body" => $data
            ];
        }else{
            $response = [
                "status" => "error",
                "statusCode" => 500,
                "message" => "Error during login.",
            ];
        }
        
        return $response;
    }

}