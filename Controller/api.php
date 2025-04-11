<?php
header('Content-Type: application/json'); // JSON válasz
ini_set('display_errors', 1);
error_reporting(E_ALL);

// MySQL kapcsolat beállításai
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "yumeneko";

// Kapcsolódás
$conn = new mysqli($host, $user, $pass, $dbname);

// Kapcsolati hiba ellenőrzése
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection error: " . $conn->connect_error]));
}

// $sql = "SELECT * FROM customers";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     $data = [];
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
//     echo json_encode($data);
// } else {
//     echo json_encode(["message" => "Not found."]);
// }

// $sql = "SELECT * FROM menu_items";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     $data = [];
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
//     echo json_encode($data);
// } else {
//     echo json_encode(["message" => "Not found."]);
// }

$conn->close();
?>
