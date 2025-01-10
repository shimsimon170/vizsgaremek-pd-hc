<?php
require_once "Request.php";
require_once "Response.php";

class Router{
    private static $routes = [];

    static function get($endpoint, $callback){
        self::$routes["GET"][$endpoint] = $callback;
    }

    static function post($endpoint, $callback){
        self::$routes["POST"][$endpoint] = $callback;
    }

    static function handleRequest(){
        $request = new Request;
        $response = new Response;
        $method = $request->getMethod();
        $uri = $request->getUri();
        parse_str($request->getQuery(), $queryParams); 
       
        $callback = self::$routes[$method][$uri];

        return $callback($request,$response);
    }
}