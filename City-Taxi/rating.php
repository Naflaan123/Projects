<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest driver information
$driver_query = "SELECT driver_id, first_name FROM tbldriver ORDER BY driver_id DESC LIMIT 1";
$driver_result = $conn->query($driver_query);
$driver = $driver_result->fetch_assoc();

// Automatically set Passenger ID from session or create a new Passenger ID if not found
if (isset($_SESSION['PassengerID'])) {
    $passenger_id = $_SESSION['PassengerID'];
} else {
    // Fetch the maximum PassengerID from the database and increment it by 1
    $passenger_query = "SELECT MAX(PassengerID) as max_passenger_id FROM tblpassenger";
    $passenger_result = $conn->query($passenger_query);
    $passenger = $passenger_result->fetch_assoc();
    
    if ($passenger['max_passenger_id']) {
        $passenger_id = $passenger['max_passenger_id'] + 1; // Increment by 1
    } else {
        $passenger_id = 1; // Start from 1 if no passengers exist
    }

    // Set the new PassengerID in session
    $_SESSION['PassengerID'] = $passenger_id;
}

// Automatically set Rate ID
$rate_query = "SELECT MAX(RateID) as max_rate_id FROM tblrate";
$rate_result = $conn->query($rate_query);
$rate = $rate_result->fetch_assoc();
$rate_id = $rate['max_rate_id'] ? $rate['max_rate_id'] + 1 : 1; // Start from 1 if no ratings exist

// Initialize variables to store rating details
$ratingDetails = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the form submission
    $rating = $_POST['lstRating'];
    $review = $_POST['txtReview'];
    $dateTime = $_POST['txtDateTime'];
    $driverName = $driver['first_name'];

    // Input validation (optional, adjust as needed)
    $rating = intval($rating); // Ensure it's an integer
    $review = htmlspecialchars($review); // Prevent XSS
    $dateTime = htmlspecialchars($dateTime); // Prevent XSS

    // Insert the rating into the database
    $insert_query = "INSERT INTO tblrate (RateID, PassengerID, DriverID, Rating, Review, DateTime, DriverName) VALUES ('$rate_id', '$passenger_id', '{$driver['driver_id']}', '$rating', '$review', '$dateTime', '$driverName')";

    if ($conn->query($insert_query) === TRUE) {
        $ratingDetails = [
            'RateID' => $rate_id,
            'PassengerID' => $passenger_id,
            'DriverID' => $driver['driver_id'],
            'DriverName' => $driverName,
            'Rating' => $rating,
            'Review' => $review,
            'DateTime' => $dateTime
        ];
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Rating Page</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <style>
        .rating-details {
            position: fixed; /* Changed to fixed */
            bottom: 20px;   /* Position from the bottom */
            right: 20px;    /* Position from the right */
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;   /* Set a fixed width for better alignment */
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <a class="nav-link" href="Contactus.php">Contact us</a>
                <a class="nav-link" href="Flavours.php">Models</a>
                <a class="nav-link" href="History.php">History</a>
            </div>
        </nav>

        <br><br><br><br><br><br>
        
        <h1 class="text-center">Driver Rating Page</h1>
        <p class="text-center">Rate your driver by filling the details below</p>

        <form id="form1" name="form1" method="post" action="">
            <table width="507" border="0" align="center">
                <tr>
                    <td width="205">Rate ID</td>
                    <td width="292"><input type="text" name="txtRateID" id="txtRateID" value="<?php echo $rate_id; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Passenger ID</td>
                    <td><input type="text" name="txtPassengerID" id="txtPassengerID" value="<?php echo $passenger_id; ?>" readonly /></td>
                </tr>

                <tr>
                    <td>Driver ID</td>
                    <td><input type="text" name="txtDriverID" id="txtDriverID" value="<?php echo $driver['driver_id']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Rating (1-5)</td>
                    <td>
                        <select name="lstRating" id="lstRating" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Review</td>
                    <td><textarea name="txtReview" id="txtReview" placeholder="Optional"></textarea></td>
                </tr>
                <tr>
                    <td>Date and Time</td>
                    <td><input type="datetime-local" name="txtDateTime" id="txtDateTime" required /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit Rating" />
                        <input type="reset" name="btnReset" id="btnReset" value="Cancel" />
                    </td>
                </tr>
            </table>
        </form>

        <?php if ($ratingDetails): ?>
            <div class="rating-details">
                <h4>Rating Details</h4>
                <p><strong>Rate ID:</strong> <?php echo $ratingDetails['RateID']; ?></p>
                <p><strong>Passenger ID:</strong> <?php echo $ratingDetails['PassengerID']; ?></p>
                <p><strong>Driver ID:</strong> <?php echo $ratingDetails['DriverID']; ?></p>
                <p><strong>Driver Name:</strong> <?php echo $ratingDetails['DriverName']; ?></p>
                <p><strong>Rating:</strong> <?php echo $ratingDetails['Rating']; ?></p>
                <p><strong>Review:</strong> <?php echo $ratingDetails['Review']; ?></p>
                <p><strong>Date and Time:</strong> <?php echo $ratingDetails['DateTime']; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <br><br><br><br><br><br><br>

    <footer>
        <div class="row">
            <div class="col-lg-6 offset-lg-0 text-center">
                Copyright &copy; 2022 All rights reserved
            </div>
        </div>
    </footer>

</div>

</body>
</html>
