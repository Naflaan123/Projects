<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driverId = htmlspecialchars($_POST['driver_id']);

    // Fetch the driver's location from the database
    $sql = "SELECT location FROM tbldriver WHERE driver_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $driverId);
    $stmt->execute();
    $stmt->bind_result($location);
    $stmt->fetch();

    echo $location;

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
