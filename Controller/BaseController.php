<?php
require_once "CustomerController.php";

class BaseController{
    public static function handleRequest(){
        $uri = $_SERVER["REQUEST_URI"];

        switch(parse_url($uri)["path"]){
            case "/":
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    $result = [
                        "status" => "success",
                        "statusCode" => 200,
                        "message" => "This is the home page"
                    ];
                }else{
                    $result = [
                        "status" => "error",
                        "statusCode" => 405,
                        "message" => "This method not allowed for this endpoint"
                    ];
                }
                break;
            case "/movies":
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    $result = MovieController::getAllMovies();
                }else{
                    $result = [
                        "status" => "error",
                        "statusCode" => 405,
                        "message" => "This method not allowed for this endpoint"
                    ];
                }
                break;
            default:
                $result = [
                    "status" => "error",
                    "statusCode" => 400,
                    "message" => "No such endpoint"
                ];
                
        }
        http_response_code($result["statusCode"]);
        echo json_encode($result);
    }
}
BaseController::handleRequest();
