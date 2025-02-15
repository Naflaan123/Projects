<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = ""; // No password for root
$dbname = "fit_x"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId']; // Accessing the correct key
    $password = $_POST['password'];

    // Prepare and bind
    // Check if Accepted = 1
    $stmt = $conn->prepare("SELECT * FROM tbltrainers WHERE Username = ? AND Password = ? AND Accepted = 1");
    $stmt->bind_param("ss", $userId, $password); // Assuming both are strings

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION['username'] = $userId; // Set session variable
        header("Location: trainerindex.php"); // Redirect to index.php
        exit();
    } else {
        echo "Invalid User ID or Password or Trainer not accepted.";
    }

    $stmt->close();
}

$conn->close();
?>
