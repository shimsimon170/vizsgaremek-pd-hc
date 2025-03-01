<?php
require 'db.php'; // Adatbázis kapcsolat

// Hibaüzenetek engedélyezése
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone']; // Telefonszám beolvasása
    $email = $_POST['email'];
    $password = $_POST['password']; // Jelszó beolvasása

    // Ellenőrizzük, hogy az email már létezik-e
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Ez az email már regisztrálva van.";
    } else {
        // Jelszó hash-elése
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $is_admin = 0; // Alapértelmezett érték, ha nem admin

        // Felhasználó hozzáadása
        $stmt = $conn->prepare("INSERT INTO customers (name, phone, email, password, is_admin) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $phone, $email, $hashed_password, $is_admin);
        
        if ($stmt->execute()) {
            echo "Sikeres regisztráció!";
        } else {
            echo "Hiba történt a regisztráció során: " . $stmt->error;
        }
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Név" required>
    <input type="text" name="phone" placeholder="Telefonszám" required> <!-- Telefonszám mező hozzáadása -->
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Jelszó" required>
    <button type="submit">Regisztrálj</button>
</form>