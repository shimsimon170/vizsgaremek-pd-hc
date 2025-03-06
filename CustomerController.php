<?php

require_once 'CustomerService.php';
require_once 'Request.php';
require_once 'Response.php';

class CustomerController{

    static function registerCustomer(Request $request) {

        $customerArray = $request->getBody();
        
        $customer = new Customer($customerArray['name'], $customerArray['phone'], $customerArray['email'], $customerArray['password'], $customerArray['is_admin']);
        $response = UserService::register($customer);

        return $response;
    }

    static function login(Request $request) {
        $customerArray = $request->getBody();
        $email = $customerArray['email'];
        $password = $customerArray['password'];
        
        $response = CustomerService::login($email, $password);
        
        return $response;
    }

}