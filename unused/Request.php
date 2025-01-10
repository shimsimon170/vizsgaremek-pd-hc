<?php
class Request{
    private $uri;
    private $method;
    private $body = [];
    private $query;

    function __construct(){
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        $this->query = parse_url($_SERVER["REQUEST_URI"])["query"];
        $body = [];
        foreach ($_POST as $key => $value) {
            $body[$key] = $value;
        }
        $this->body = $body;
    }

    function getUri(){
        return $this->uri;
    }

    function getMethod(){
        return $this->method;
    }

    function getBody(){
        return $this->body;
    }

    function getQuery(){
        
        return $this->query;
    }
}