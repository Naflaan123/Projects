<?php 
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch driver details from the database using session variables
$driverName = 'N/A';
$driverId = 'N/A';
if (isset($_SESSION['driver_id'])) {
    $driverId = $_SESSION['driver_id'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT first_name FROM tbldriver WHERE driver_id = ?");
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    $stmt->bind_result($driverName);
    $stmt->fetch();
    $stmt->close();
}

// Debugging: Check session variables
// Uncomment this line to debug session variables
// echo '<pre>'; print_r($_SESSION); echo '</pre>'; // Remove this line after debugging
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Interface</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="driverstyles.css" rel="stylesheet" type="text/css">
    <style>
        /* Remove background color */
        body {
            margin: 0; /* Remove default margin */
            overflow: hidden; /* Prevent scrolling */
            background-color: transparent; /* Ensure body background is transparent */
        }

        /* Styling for the image */
        .admin-image {
            position: fixed; /* Fix the position to cover the entire screen */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the entire screen while maintaining aspect ratio */
            opacity: 1; /* Set opacity to 1 for full visibility */
            z-index: -1; /* Send image to the background */
        }
    </style>
</head>
<body>

    <img src="images/admin.jpg" alt="Admin Image" class="admin-image">

    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Admin Portal</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="admininterface.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="telephone.php">Manual Orders</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <br>

            <h1 class="text-center text-light">Welcome to the Admin Portal</h1>
            <p class="text-center text-light">Manage your orders and updates below:</p>

            

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <!-- Buttons Section -->
            <div class="text-center">
                <a href="manage_passenger.php" class="btn btn-primary m-2">Manage Passengers</a>
                <a href="manage_driver.php" class="btn btn-primary m-2">Manage Drivers</a>
                <a href="generate_report.php" class="btn btn-primary m-2">Passenger Report</a>
                <a href="generate_driver.php" class="btn btn-primary m-2">Driver Report</a>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $updateStatus = $_POST['updateStatus'];
                $comments = $_POST['comments'];
                $driverLocation = $_POST['driverLocation']; // Retrieve the location

                // Add your database connection and data insertion logic here for order status, comments, and location
                $insertStmt = $conn->prepare("INSERT INTO order_updates (driver_id, status, comments, location) VALUES (?, ?, ?, ?)");
                $insertStmt->bind_param("isss", $driverId, $updateStatus, $comments, $driverLocation);
                $insertStmt->execute();
                $insertStmt->close();

                echo "<p class='text-center text-success'>Order update and location submitted successfully!</p>";
            }
            ?>
           
        </div>

        <footer class="text-center mt-5" style="background-color: transparent; padding: 20px;">
            <div class="row">
                <div class="col-lg-12">
                    Copyright © 2024 All rights reserved
                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>

    <!-- Google Maps API Script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWKoWzfRG45KW0c3jX-srz-toeDPABylw&callback=initMap" async defer></script>

    <script>
    // Initialize and add the map
    function initMap() {
        // Default location (use driver's last known location or a default)
        var defaultLocation = { lat: -25.344, lng: 131.036 }; 

        // The map, centered at the default location
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: defaultLocation
        });

        // Marker, positioned at default location
        var marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true // Allow the driver to drag the marker
        });

        // Event listener to update the location input field when the marker is moved
        google.maps.event.addListener(marker, 'dragend', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            document.getElementById('driverLocation').value = lat + ',' + lng;
        });

        // Optional: Use the browser's geolocation to update map center and marker
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                marker.setPosition(pos);
                document.getElementById('driverLocation').value = pos.lat + ',' + pos.lng;
            });
        }
    }
    </script>

</body>
</html>
