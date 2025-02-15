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

    // Prepare and execute the SQL statement to fetch driver name
    $stmt = $conn->prepare("SELECT first_name FROM tbldriver WHERE driver_id = ?");
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    $stmt->bind_result($driverName);
    $stmt->fetch();
    $stmt->close();
}

// Handle form submission for updating order status and location
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updateStatus = $_POST['updateStatus'];
    $driverLocation = $_POST['driverLocation']; // Retrieve the location

    // Extract latitude and longitude from driverLocation
    list($driverLatitude, $driverLongitude) = explode(',', $driverLocation); // Get latitude and longitude

    // Store the driver's latitude, longitude, and status in the database
    $updateStmt = $conn->prepare("UPDATE tbldriver SET driver_latitude = ?, driver_longitude = ?, status = ? WHERE driver_id = ?");
    $updateStmt->bind_param("ddsi", $driverLatitude, $driverLongitude, $updateStatus, $driverId);
    
    // Execute the update statement and check for errors
    if (!$updateStmt->execute()) {
        echo "Error updating location and status: " . $updateStmt->error;
    } else {
        echo "<p class='text-center text-success'>Location and status updated successfully!</p>";
    }
    $updateStmt->close();
}

// Function to fetch the latest review
function fetchLatestReview($conn) {
    $stmt = $conn->prepare("SELECT RateID, PassengerID, DriverID, Rating, Review FROM tblrate ORDER BY RateID DESC LIMIT 1");
    $stmt->execute();
    $stmt->bind_result($rateID, $passengerID, $driverID, $rating, $review);
    $stmt->fetch();
    $stmt->close();

    return compact('rateID', 'passengerID', 'driverID', 'rating', 'review');
}

$latestReview = fetchLatestReview($conn);
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
</head>
<body>

<div class="container-fluid">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Driver Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="driverinterface.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">Orders</a>
                    </li>
                </ul>
            </div>
        </nav>

        <br>
        <br>

        <h1 class="text-center">Welcome to the Driver Interface</h1>
        <p class="text-center">Manage your orders and updates below:</p>

        <form id="orderForm" name="orderForm" method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <td><label for="driverName">Driver Name</label></td>
                    <td><input type="text" name="driverName" id="driverName" class="form-control" value="<?php echo htmlspecialchars($driverName); ?>" readonly required /></td>
                </tr>
                <tr>
                    <td><label for="driverId">Driver ID</label></td>
                    <td><input type="text" name="driverId" id="driverId" class="form-control" value="<?php echo htmlspecialchars($driverId); ?>" readonly required /></td>
                </tr>
                <tr>
                    <td><label for="updateStatus">Update Order Status</label></td>
                    <td>
                        <select name="updateStatus" id="updateStatus" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="Available">Available</option>
                            <option value="Busy">Busy</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="driverLocation">Driver Current Location</label></td>
                    <td>
                        <input type="text" name="driverLocation" id="driverLocation" class="form-control" readonly required />
                        <div id="map" style="height: 400px;"></div> <!-- Map Container -->
                    </td>
                </tr>
            </table>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Update</button>
                <button type="button" class="btn btn-info" id="checkReviewBtn">Check Review</button>
            </div>
        </form>

        <!-- Modal for Review -->
        <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Latest Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Rate ID:</strong> <span id="rateID"></span></p>
                        <p><strong>Passenger ID:</strong> <span id="passengerID"></span></p>
                        <p><strong>Driver ID:</strong> <span id="driverID"></span></p>
                        <p><strong>Rating:</strong> <span id="rating"></span></p>
                        <p><strong>Review:</strong> <span id="review"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-center mt-5">
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
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            marker.setPosition(pos);
            map.setCenter(pos);
            document.getElementById('driverLocation').value = pos.lat + ',' + pos.lng;
        });
    }
}

// Fetch the latest review data and populate the modal
document.getElementById('checkReviewBtn').addEventListener('click', function() {
    var reviewData = <?php echo json_encode($latestReview); ?>; // Encode PHP array to JS
    document.getElementById('rateID').textContent = reviewData.rateID;
    document.getElementById('passengerID').textContent = reviewData.passengerID;
    document.getElementById('driverID').textContent = reviewData.driverID;
    document.getElementById('rating').textContent = reviewData.rating;
    document.getElementById('review').textContent = reviewData.review;

    // Show the modal
    $('#reviewModal').modal('show');
});
</script>

</body>
</html>
