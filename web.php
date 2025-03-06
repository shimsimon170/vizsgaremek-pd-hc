<?php
require_once "Router.php";
require_once "CustomerController.php";

Router::get("/",function($request,$response){
    //
});

Router::post("/register",function($request,$response){
    return CustomerController::registerCustomer($request);
});

Router::post("/login",function($request,$response){
    return CustomerController::login($request);
});

$response = Router::handleRequest();

