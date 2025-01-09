<?php
// require_once "UserController.php";

// $uri = parse_url($_SERVER['REQUEST_URI']);
// $method = $_SERVER['REQUEST_METHOD'];
// $uriPath = $uri["path"];

// if (isset($uri["query"])) {
//     $uriQuery = $uri["query"];
// } else {
//     $uriQuery = null;
// }

// $body = [];

// if ($method == 'POST') {
//     $body["name"] = $_POST["name"];
//     $body["email"] = $_POST["email"];
//     $body["age"] = $_POST["age"];
// }

// $request = [
//     "uri" => $uriPath,
//     "method" => $method,
//     "query" => $uriQuery,
//     "body" => $body
// ];

// switch ($request["uri"]) {
//     case '/':
//         //nem kell csinálni semmit homeon vagyunk
//         break;
//     case '/users':

//         if ($request['method'] == 'GET') {

//             if ($request["query"] != null) {
//                 $userid = explode("=", $request["query"])[1];
//                 $response = UserController::getUserById($userid);
//             } else {
//                 $response = UserController::getAllUser();
//             }
//         }

//         if ($request['method'] == 'POST') {
//             $response = UserController::addUser($request);
//         }

//         break;
//     default:
//         $response = [
//             "status" => "error",
//             "message" => "Endpoint not found",
//         ];
//         echo $response["message"];
//         http_response_code(404);
// }
