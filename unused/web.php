<?php
require_once "Router.php";
require_once "ItemController.php";

Router::get("/menu",function($request, $response){
    return ItemController::getAllItems();
    
});

Router::post("/menu",function($request, $response){
    return ItemController::addItem($request);
});

Router::get("/menu/search",function($request, $response){
    return ItemController::searchItem($request);
});

$response = Router::handleRequest();