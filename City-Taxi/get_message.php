<?php
// get_message.php
$servername = "localhost"; // Change as necessary
$username = "root"; // Change as necessary
$password = ""; // Change as necessary
$dbname = "city-taxi"; // Change as necessary

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the latest message
$sql = "SELECT message FROM tblmsg ORDER BY msgID DESC LIMIT 1"; // Adjust according to your table structure
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the latest message
    $row = $result->fetch_assoc();
    echo $row['message'];
} else {
    echo "No messages available.";
}

$conn->close();
?>
