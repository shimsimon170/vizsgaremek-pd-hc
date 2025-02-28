<?php
// Include the database connection
include('db.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    // Validate that the passwords match
    if ($password !== $rePassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to check if the email already exists
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "An account with this email already exists.";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO customers (email, password, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $email, $hashedPassword);

        if ($stmt->execute()) {
            // Redirect to the menu page upon successful registration
            header("Location: menus.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
