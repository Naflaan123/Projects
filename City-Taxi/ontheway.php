<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On the Way</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height */
            margin: 0; /* Remove default margin */
        }

        .ontheway-container {
            background-color: #ffffff; /* White background for content area */
            border-radius: 5px; /* Rounded corners */
            padding: 20px; /* Padding around the content */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            text-align: center; /* Center text */
            width: 90%; /* Responsive width */
            max-width: 600px; /* Max width for larger screens */
        }

        .ontheway-header {
            background-color: #D97205; /* Header background color */
            color: white; /* Text color */
            padding: 15px; /* Padding for header */
            border-radius: 5px 5px 0 0; /* Rounded corners at the top */
            font-size: 24px; /* Font size for header */
        }

        .driver-info h2 {
            color: #D97205; /* Driver name color */
            margin: 10px 0; /* Margin for h2 */
        }

        .vehicle-info {
            font-size: 16px; /* Font size for vehicle info */
            color: #8E520A; /* Vehicle info text color */
            margin: 10px 0; /* Margin for vehicle info text */
        }

        .status-info {
            font-size: 16px; /* Font size for status */
            color: #000; /* Color for status text */
            margin: 10px 0; /* Margin for status text */
        }

        .driver-location {
            font-size: 16px; /* Font size for location */
            color: #000; /* Color for location text */
            margin: 10px 0; /* Margin for location text */
        }

        /* Map container styling */
        .map {
            width: 100%; /* Full width of the container */
            height: 300px; /* Height of the map */
            margin: 15px 0; /* Margin above and below the map */
            border: 1px solid #ccc; /* Light border around the map */
            border-radius: 5px; /* Rounded corners for the map */
        }

        .back-button {
            background-color: #D97205; /* Button background color */
            color: white; /* Button text color */
            border: none; /* No border */
            padding: 10px 20px; /* Padding for button */
            border-radius: 5px; /* Rounded corners for button */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 16px; /* Font size for button */
            margin-top: 20px; /* Space above the button */
        }

        .back-button:hover {
            background-color: #c76e04; /* Darker shade on hover */
        }

        .hidden {
            display: none; /* Hides elements */
        }
    </style>
</head>
<body>
    <div class="ontheway-container">
        <div class="ontheway-header">
            <h1>Track Your Driver!</h1>
        </div>
        <div class="driver-info <?php echo isset($driverName) ? '' : 'hidden'; ?>" id="driverInfo">
            <h2>Driver: <span id="driverName"><?php echo isset($driverName) ? htmlspecialchars($driverName) : ''; ?></span></h2>
        </div>
        <div class="vehicle-info <?php echo isset($vehicle) ? '' : 'hidden'; ?>" id="vehicleInfo">
            <p>Vehicle: <span id="vehicle"><?php echo isset($vehicle) ? htmlspecialchars($vehicle) : ''; ?></span></p>
        </div>
        <div class="status-info <?php echo isset($status) ? '' : 'hidden'; ?>" id="statusInfo">
            <p>Status: <span id="status"><?php echo isset($status) ? htmlspecialchars($status) : ''; ?></span></p>
        </div>
        <div class="driver-location <?php echo isset($location) ? '' : 'hidden'; ?>" id="driverLocation">
            <p>Location: <span id="location"><?php echo isset($location) ? htmlspecialchars($location) : ''; ?></span></p>
        </div>
        <div class="map" id="map"></div> <!-- Placeholder for map -->
        <button class="back-button" onclick="goBack()">Back</button>
    </div>

    <script>
        function goBack() {
            window.location.href = 'orderpage.php'; // Navigate to orderpage.php
        }

        // Function to fill in driver details
        function fillDriverDetails() {
            // Simulating the condition where the driver accepts the order
            const orderAccepted = true; // Change this to false to simulate order not accepted

            if (orderAccepted) {
                // Driver details to be filled in
                const driverName = "<?php echo isset($driverName) ? htmlspecialchars($driverName) : ''; ?>"; // Replace with dynamic data if available
                const vehicle = "<?php echo isset($vehicle) ? htmlspecialchars($vehicle) : ''; ?>"; // Replace with dynamic data if available
                const status = "<?php echo isset($status) ? htmlspecialchars($status) : ''; ?>"; // Replace with dynamic data if available
                const location = "<?php echo isset($location) ? htmlspecialchars($location) : ''; ?>"; // Replace with dynamic data if available

                // Updating the HTML elements with driver details
                document.getElementById("driverName").innerText = driverName;
                document.getElementById("vehicle").innerText = vehicle;
                document.getElementById("status").innerText = status;
                document.getElementById("location").innerText = location;

                // Making the driver details visible
                document.getElementById("driverInfo").classList.remove("hidden");
                document.getElementById("vehicleInfo").classList.remove("hidden");
                document.getElementById("statusInfo").classList.remove("hidden");
                document.getElementById("driverLocation").classList.remove("hidden");

                initMap(); // Initialize the map after details are filled
            }
        }

        // Initialize the map using Google Maps API
        function initMap() {
            const location = { lat: 40.712776, lng: -74.005974 }; // Example coordinates (New York City)
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: location,
            });
            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "Driver's Location",
            });
        }

        // Call the fillDriverDetails function to populate the data
        fillDriverDetails();
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script> <!-- Replace YOUR_API_KEY -->
</body>
</html>
