<?php
require 'db.php'; // Adatbázis kapcsolat

// Hibaüzenetek engedélyezése
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; // Jelszó beolvasása

    // Ellenőrizzük, hogy az email létezik-e
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Ellenőrizzük a jelszót
        if (password_verify($password, $user['password'])) {
            // Sikeres bejelentkezés
            echo "Sikeres bejelentkezés! Üdvözöljük, " . htmlspecialchars($user['name']) . "!";
            // Itt lehetne átirányítani a felhasználót egy másik oldalra
        } else {
            echo "Hibás jelszó.";
        }
    } else {
        echo "Ez az email cím nem található.";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Jelszó" required>
    <button type="submit">Bejelentkezés</button>
</form>