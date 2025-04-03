<?php
require_once __DIR__ . "../Controller/Router.php";
require_once __DIR__ . "../Controller/CustomerController.php";

Router::get("/",function($request,$response){
    header("Location: homepage.php"); 
    exit();
});

Router::post("/register",function($request,$response){
    return CustomerController::registerCustomer($request);
     
    exit();
});

Router::post("/login",function($request,$response){
    return CustomerController::login($request);
    header("Location: menus.php"); 
    exit();
});

$response = Router::handleRequest();

