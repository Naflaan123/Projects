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

// Fetch latest drivers' first names for dropdown
$drivers = [];
$result = $conn->query("SELECT driver_id, first_name FROM tbldriver ORDER BY driver_id DESC LIMIT 10"); // Adjust the limit as needed
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $drivers[] = $row;
    }
}
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
        html, body {
            background-color: lightblue; /* Set background color to light blue */
            height: 100%; /* Make sure the body takes the full height */
            margin: 0; /* Remove default margin */
        }
        .btn-custom {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>

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
                        <a class="nav-link" href="telephone.php">Manual Orders</a> <!-- Updated link -->
                    </li>
                </ul>
            </div>
        </nav>

        <br>
        <br>
        <h1 class="text-center">Telephone Booking Page</h1>
        <p class="text-center">Fill the telephone booking details below</p>

        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $manualBookingID = $_POST['txtManualBookingID'];
            $customerName = $_POST['txtCustomerName'];
            $contactNumber = $_POST['txtContactNumber'];
            $pickupLocation = $_POST['pickupLocation'];
            $dropoffLocation = $_POST['txtDropoffLocation'];
            $bookingDateTime = $_POST['txtBookingDateTime'];
            $assignedDriverID = $_POST['lstDrivers'];
            $smsStatus = $_POST['lstSMSStatus'];

            // Insert booking details into the database
            $stmt = $conn->prepare("INSERT INTO tbltelephone (manual_booking_id, customer_name, contact_number, pickup_location, dropoff_location, booking_datetime, assigned_driver_id, sms_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssiss", $manualBookingID, $customerName, $contactNumber, $pickupLocation, $dropoffLocation, $bookingDateTime, $assignedDriverID, $smsStatus);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Booking submitted successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        }
        ?>

        <form id="form1" name="form1" method="post" action="">
            <table width="507" border="0" align="center">
                <tr>
                    <td width="205">Manual Booking ID</td>
                    <td width="292"><input type="text" name="txtManualBookingID" id="txtManualBookingID" required /></td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td><input type="text" name="txtCustomerName" id="txtCustomerName" required /></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><input type="text" name="txtContactNumber" id="txtContactNumber" required /></td>
                </tr>
                <tr>
                    <td>Pickup Location</td>
                    <td>
                        <div id="map" style="height: 300px; width: 100%;"></div>
                        <input type="text" name="pickupLocation" id="pickupLocation" placeholder="Selected Pickup Location" readonly />
                        <button type="button" onclick="getLocation()">Get Current Location</button>
                    </td>
                </tr>
                <tr>
                    <td>Dropoff Location</td>
                    <td><textarea name="txtDropoffLocation" id="txtDropoffLocation" required></textarea></td>
                </tr>
                <tr>
                    <td>Booking DateTime</td>
                    <td><input type="datetime-local" name="txtBookingDateTime" id="txtBookingDateTime" required /></td>
                </tr>
                <tr>
                    <td>Assigned Driver ID</td>
                    <td>
                        <select name="lstDrivers" id="lstDrivers" required>
                            <option value="">Select a driver</option>
                            <?php foreach ($drivers as $driver): ?>
                                <option value="<?= $driver['driver_id'] ?>"><?= htmlspecialchars($driver['first_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>SMS Status</td>
                    <td>
                        <select name="lstSMSStatus" id="lstSMSStatus">
                            <option value="Sent">Sent</option>
                            <option value="Pending">Pending</option>
                            <option value="Failed">Failed</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" class="btn btn-custom" name="btnSubmit" id="btnSubmit" value="Submit Booking" />
                        <input type="reset" class="btn btn-custom" name="btnReset" id="btnReset" value="Cancel" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <br>
    <br>

    <footer class="text-center mt-5" style="background-color: lightblue; padding: 20px;">
        <div class="row">
            <div class="col-lg-12">
                Copyright © 2024 All rights reserved
            </div>
        </div>
    </footer>

</div>

<!-- Google Maps and location picker functionality -->
<script>
    let map, marker;

    function initMap() {
        const initialPosition = { lat: -25.344, lng: 131.036 }; // Initial map position

        // Create map
        map = new google.maps.Map(document.getElementById("map"), {
            center: initialPosition,
            zoom: 8
        });

        // Add a marker at the initial position
        marker = new google.maps.Marker({
            position: initialPosition,
            map: map,
            draggable: true
        });

        // Listen for drag events on the marker
        google.maps.event.addListener(marker, 'dragend', function() {
            const lat = marker.getPosition().lat();
            const lng = marker.getPosition().lng();
            document.getElementById('pickupLocation').value = 'Lat: ' + lat + ', Lng: ' + lng;
        });

        // Click event on map to reposition the marker
        google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            const lat = event.latLng.lat();
            const lng = event.latLng.lng();
            document.getElementById('pickupLocation').value = 'Lat: ' + lat + ', Lng: ' + lng;
        });
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                marker.setPosition(pos);
                map.setCenter(pos);
                document.getElementById('pickupLocation').value = 'Lat: ' + pos.lat + ', Lng: ' + pos.lng;
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWKoWzfRG45KW0c3jX-srz-toeDPABylw&callback=initMap"></script>

</body>
</html>
