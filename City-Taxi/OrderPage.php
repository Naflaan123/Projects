<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Booking Order Page</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <style>
        #map,
        #dropMap {
            height: 400px;
            width: 100%;
        }
    </style>
    <!-- Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWKoWzfRG45KW0c3jX-srz-toeDPABylw&callback=initMap"
        async defer></script>
</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <a class="nav-link" href="Contactus.php">Contact us</a>
                    
                    <ul class="navbar-nav mr-auto"></ul>
                </div>
            </nav>

            <h1 class="text-center">Car Booking Order Page</h1>
            <p class="text-center">Book your ride by filling the details below</p>

            <form id="form1" name="form1" method="post" action="">
                <table width="507" border="0" align="center">
                    <tr>
                        <td width="205">Name</td>
                        <td width="292"><input type="text" name="txtName" id="txtName" required /></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td><input type="text" name="txtTime" id="txtTime" placeholder="Ex. 11.00 AM" required /></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" name="txtQuantity" id="txtQuantity" required /></td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td><input type="text" name="txtContactNumber" id="txtContactNumber" required /></td>
                    </tr>
                    <tr>
                        <td>Pickup Location</td>
                        <td>
                            <div id="map"></div>
                            <input type="text" name="pickupLocation" id="pickupLocation"
                                placeholder="Selected Pickup Location" readonly required />
                            <button type="button" onclick="getLocation()">Get Current Location</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Drop Location</td>
                        <td>
                            <div id="dropMap"></div>
                            <input type="text" name="dropLocation" id="dropLocation"
                                placeholder="Selected Drop Location" readonly required />
                            <button type="button" onclick="getDropLocation()">Drop off Location</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Vehicles</td>
                        <td>
                            <select name="lstFlavours" id="lstFlavours" required>
                                <option value="Car">Car</option>
                                <option value="Swift">Swift</option>
                                <option value="Van">Van</option>
                                <option value="Bike">Bike</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Choose Driver</td>
                        <td>
                            <select name="lstDrivers" id="lstDrivers" required onchange="updateDriverLocation()">
                                <option value="">Select a driver</option>
                                <?php
                                // Database connection
                                $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Fetch drivers from tbldriver table
                                $sql = "SELECT first_name, driver_id FROM tbldriver";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row['driver_id']) . "'>" . htmlspecialchars($row['first_name']) . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No drivers available</option>";
                                }

                                $conn->close();
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Driver Location</td>
                        <td>
                            <input type="text" name="driverLocation" id="driverLocation"
                                placeholder="Driver's Location" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td>Send updates to my phone</td>
                        <td><input type="checkbox" name="chkUpdates" id="chkUpdates" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Book Now" />
                            <input type="reset" name="btnReset" id="btnReset" value="Cancel" />
                        </td>
                    </tr>
                </table>
            </form>

            <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Capture form data
                $name = htmlspecialchars($_POST['txtName']);
                $time = htmlspecialchars($_POST['txtTime']);
                $quantity = htmlspecialchars($_POST['txtQuantity']);
                $contactNumber = htmlspecialchars($_POST['txtContactNumber']);
                $pickupLocation = htmlspecialchars($_POST['pickupLocation']);
                $dropLocation = htmlspecialchars($_POST['dropLocation']);
                $vehicle = htmlspecialchars($_POST['lstFlavours']);
                $driver = htmlspecialchars($_POST['lstDrivers']);
                $updates = isset($_POST['chkUpdates']) ? 1 : 0; // Convert to boolean

                // SQL query to insert data into tblBooking
                $sql = "INSERT INTO tblBooking (Name, Time, Quantity, ContactNumber, PickupLocation, DropLocation, Vehicle, Driver, Updates) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiissssb", $name, $time, $quantity, $contactNumber, $pickupLocation, $dropLocation, $vehicle, $driver, $updates);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success text-center'>Your booking for $vehicle has been received!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Error: " . $stmt->error . "</div>";
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
            }
            ?>

            <!-- Add Rating and Payment buttons -->
            <div class="text-center">
                <br>
                <button onclick="window.location.href='rating.php'" class="btn btn-primary">Add Rating</button>
                <button onclick="window.location.href='payment.php'" class="btn btn-success">Payment</button>
            </div>

        </div>

        <br>
        <br>

        <footer></footer>
        <div class="row">
            <div class="col-lg-6 offset-lg-0">
                Copyright C 2022 All rights reserved
            </div>
        </div>

    </div>

    <script>
        let map, dropMap, marker, dropMarker;

        function initMap() {
            const initialPosition = { lat: -25.344, lng: 131.036 }; // Initial map position

            // Create maps
            map = new google.maps.Map(document.getElementById("map"), {
                center: initialPosition,
                zoom: 8
            });
            dropMap = new google.maps.Map(document.getElementById("dropMap"), {
                center: initialPosition,
                zoom: 8
            });

            // Add markers
            marker = new google.maps.Marker({
                position: initialPosition,
                map: map,
                draggable: true
            });
            dropMarker = new google.maps.Marker({
                position: initialPosition,
                map: dropMap,
                draggable: true
            });

            // Add event listeners to update location inputs when markers are dragged
            marker.addListener("dragend", () => {
                document.getElementById("pickupLocation").value = `${marker.getPosition().lat()}, ${marker.getPosition().lng()}`;
            });

            dropMarker.addListener("dragend", () => {
                document.getElementById("dropLocation").value = `${dropMarker.getPosition().lat()}, ${dropMarker.getPosition().lng()}`;
            });
        }

        // Get current location for pickup
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(currentLocation);
                    marker.setPosition(currentLocation);
                    document.getElementById("pickupLocation").value = `${currentLocation.lat}, ${currentLocation.lng}`;
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        // Get current location for drop
        function getDropLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    dropMap.setCenter(currentLocation);
                    dropMarker.setPosition(currentLocation);
                    document.getElementById("dropLocation").value = `${currentLocation.lat}, ${currentLocation.lng}`;
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

         // Fetch driver's current location from the database (for demonstration purposes, static coordinates are used)
         function updateDriverLocation() {
            const driverId = document.getElementById('lstDrivers').value;

            if (driverId) {
                // Here, you would fetch the real-time location of the driver from the server
                // For this example, I'm using static coordinates for the driver's location
                const driverLocation = 'Lat: -25.344, Lng: 131.036'; // Replace with actual data from the server
                document.getElementById('driverLocation').value = driverLocation;
            }
        }
    </script>

    <!-- Bootstrap JavaScript -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>

</body>

</html>
