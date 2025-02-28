<?php
session_start(); // Start a session to store user information

// Include the database connection file
include('db.php');

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize and validate email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Query the database to check if the user exists
    $sql = "SELECT * FROM customers WHERE email = ? AND is_deleted = 0";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email); // Bind email parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and passwords match
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['customer_id'] = $user['customer_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // Redirect to menus.php
            header("Location: menus.php");
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found');</script>";
    }
}
?>
