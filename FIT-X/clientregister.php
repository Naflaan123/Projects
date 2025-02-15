<?php
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fit_x');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Use the correct field names based on the form
    $username = $_POST['register_username'];
    $email = $_POST['register_email'];
    $password = password_hash($_POST['register_password'], PASSWORD_DEFAULT); // Hashing the password
    $gender = $_POST['register_gender'];

    // Check for empty inputs
    if (!empty($username) && !empty($email) && !empty($password) && !empty($gender)) {
        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO tblclient (username, email, password, gender) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $gender);

        if ($stmt->execute()) {
            // Set the session variable to the new user ID
            $_SESSION['userId'] = $stmt->insert_id; // Get the last inserted ID
            header("Location: login.html"); // Redirect to the account page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Please fill in all required fields.";
    }

    $stmt->close();
}
$conn->close();
?>
