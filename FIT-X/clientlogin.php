<?php 
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'fit_x');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $sql = "SELECT * FROM tblclient WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // Bind the username parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['userId'] = $row['userId']; // Store user ID in session
            header("Location: clientaccount.php"); // Redirect to client account page
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
}
$conn->close();
?>
