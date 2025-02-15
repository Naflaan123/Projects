<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit_x";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the posted data
$data = json_decode(file_get_contents("php://input"), true);
$userId = $data['userId'];

// Update the trainer status to accepted
$sql = "UPDATE tbltrainers SET Accepted = 1 WHERE UserID = ?"; // Ensure 'Accepted' is the correct column name
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Trainer accepted successfully.']);
} else {
    echo json_encode(['message' => 'Error accepting trainer.']);
}

$stmt->close();
$conn->close();
?>
