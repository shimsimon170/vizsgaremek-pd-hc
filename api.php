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

// SQL lekérdezés
$sql = "SELECT * FROM customers"; // Módosítsd a saját táblázatod nevére
$result = $conn->query($sql);

// Eredmény ellenőrzése
if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Az összes adat beolvasása
    }
    echo json_encode($data); // JSON formátumban visszaadja az adatokat
} else {
    echo json_encode(["message" => "Not found."]);
}

// Kapcsolat lezárása
$conn->close();
?>
