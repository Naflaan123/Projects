<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $booking_id = $_POST['booking_id'];

    // Update order status to 'Accepted'
    $sql = "UPDATE tblbooking SET status = 'Accepted' WHERE BookingID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $booking_id);
    if ($stmt->execute()) {
        echo "Order accepted successfully!";
    } else {
        echo "Error accepting order: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
