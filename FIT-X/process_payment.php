<?php
session_start(); // Start the session

// Database connection parameters
$servername = "localhost"; // Change as needed
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "fit_x"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$userid = isset($_POST['userid']) ? $_POST['userid'] : '';
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
$paymentmethod = isset($_POST['paymentmethod']) ? $_POST['paymentmethod'] : '';
$workout_type = isset($_POST['workout_type']) ? $_POST['workout_type'] : ''; // New field

// Check if user exists in the database
$userCheckQuery = $conn->prepare("SELECT userid FROM tblclient WHERE userid = ?");
$userCheckQuery->bind_param("i", $userid);
$userCheckQuery->execute();
$userCheckResult = $userCheckQuery->get_result();

if ($userCheckResult->num_rows > 0) {
    // User exists, proceed to insert payment details
    $stmt = $conn->prepare("INSERT INTO tblpayment (userid, amount, paymentmethod, workout_type) VALUES (?, ?, ?, ?)");

    // Convert amount to float
    $amountFloat = floatval($amount); 

    // Correct binding types: "idss" for four variables
    $stmt->bind_param("idss", $userid, $amountFloat, $paymentmethod, $workout_type);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment recorded successfully.";
    } else {
        echo "Error: " . $stmt->error; // Print error message if insert fails
    }

    // Close the statement
    $stmt->close();
} else {
    echo "User not found."; // Handle case where user does not exist
}

// Close the user check statement
$userCheckQuery->close();

// Close the connection
$conn->close();
?>
