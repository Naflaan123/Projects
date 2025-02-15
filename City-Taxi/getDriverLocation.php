<?php
if (isset($_GET['driverId'])) {
    $driverId = $_GET['driverId'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'City-Taxi');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch driver's location
    $sql = "SELECT driver_latitude, driver_longitude FROM tbldriver WHERE driver_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    $stmt->bind_result($latitude, $longitude);
    $stmt->fetch();

    if ($latitude && $longitude) {
        echo json_encode(['status' => 'success', 'latitude' => $latitude, 'longitude' => $longitude]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Location not available']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Driver ID not provided']);
}
?>
