<?php 
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$driverId = '';
$firstName = '';
$lastName = '';
$email = '';
$phone = '';
$vehicleBrand = '';
$password = '';
$driverLatitude = ''; // New variable for driver latitude
$driverLongitude = ''; // New variable for driver longitude
$message = ''; // Variable to hold messages for user feedback

// Handle search request
if (isset($_POST['search'])) {
    $driverId = $_POST['driverId'] ?? ''; // Use null coalescing operator
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM tbldriver WHERE driver_id = ?");
    $stmt->bind_param("i", $driverId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Fill variables with the data retrieved from the database
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $phone = isset($row['phone']) ? $row['phone'] : ''; // Check if the key exists
        $vehicleBrand = $row['vehicle_brand'];
        $password = $row['password']; // Get password for editing
        $driverLatitude = $row['driver_latitude']; // Get latitude
        $driverLongitude = $row['driver_longitude']; // Get longitude
    } else {
        $message = "Driver not found."; // Feedback if driver is not found
    }
    $stmt->close();
}

// Handle edit request
if (isset($_POST['edit'])) {
    $driverId = $_POST['driverId'] ?? ''; // Use null coalescing operator
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $vehicleBrand = $_POST['vehicleBrand'] ?? '';
    $password = $_POST['password'] ?? ''; // Get the new password
    $driverLatitude = $_POST['driverLatitude'] ?? null; // Get the new latitude, allow NULL
    $driverLongitude = $_POST['driverLongitude'] ?? null; // Get the new longitude, allow NULL

    // Prepare and execute the update SQL statement
    $updateStmt = $conn->prepare("UPDATE tbldriver SET first_name = ?, last_name = ?, email = ?, phone = ?, vehicle_brand = ?, password = ?, driver_latitude = ?, driver_longitude = ? WHERE driver_id = ?");
    $updateStmt->bind_param("ssssssssi", $firstName, $lastName, $email, $phone, $vehicleBrand, $password, $driverLatitude, $driverLongitude, $driverId);
    if ($updateStmt->execute()) {
        $message = "Driver details updated successfully!"; // Feedback on successful update
    } else {
        $message = "Error updating driver details: " . $conn->error; // Error message
    }
    $updateStmt->close();
}

// Handle add request
if (isset($_POST['add'])) {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $vehicleBrand = $_POST['vehicleBrand'] ?? '';
    $password = $_POST['password'] ?? ''; // Get the new password
    $driverLatitude = $_POST['driverLatitude'] ?? null; // Get the latitude, allow NULL
    $driverLongitude = $_POST['driverLongitude'] ?? null; // Get the longitude, allow NULL

    // Check if the email already exists
    $checkStmt = $conn->prepare("SELECT * FROM tbldriver WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $message = "Email already exists. Please use a different email."; // Feedback if email exists
    } else {
        // Prepare and execute the insert SQL statement
        $insertStmt = $conn->prepare("INSERT INTO tbldriver (first_name, last_name, email, phone, vehicle_brand, password, driver_latitude, driver_longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param("ssssssss", $firstName, $lastName, $email, $phone, $vehicleBrand, $password, $driverLatitude, $driverLongitude);
        if ($insertStmt->execute()) {
            $message = "Driver added successfully!"; // Feedback on successful addition
        } else {
            $message = "Error adding driver: " . $conn->error; // Error message
        }
        $insertStmt->close();
    }
    $checkStmt->close();
}

// Handle delete request
if (isset($_POST['delete'])) {
    $driverId = $_POST['driverId'] ?? ''; // Use null coalescing operator

    // Prepare and execute the delete SQL statement
    $deleteStmt = $conn->prepare("DELETE FROM tbldriver WHERE driver_id = ?");
    $deleteStmt->bind_param("i", $driverId);
    if ($deleteStmt->execute()) {
        $message = "Driver deleted successfully!"; // Feedback on successful deletion
    } else {
        $message = "Error deleting driver: " . $conn->error; // Error message
    }
    $deleteStmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Driver</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="adminstyles.css" rel="stylesheet" type="text/css"> <!-- Adjust based on your actual styles -->
    <style>
        body {
            background-color: lightblue;
        }
        #map {
            height: 400px; /* Set the height of the map */
            width: 100%; /* Set the width of the map */
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
                </ul>
            </div>
        </nav>

        <br><br>
        <h1 class="text-center">Manage Driver</h1>
        <?php if ($message): ?>
            <p class='text-center text-success'><?php echo $message; ?></p>
        <?php endif; ?>

        <form id="searchForm" name="searchForm" method="post" action="">
            <div class="form-group">
                <label for="driverId">Driver ID</label>
                <input type="text" name="driverId" id="driverId" class="form-control" value="<?php echo htmlspecialchars($driverId ?? ''); ?>" required />
            </div>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <form id="driverForm" name="driverForm" method="post" action="">
            <table class="table table-bordered mt-4">
                <tr>
                    <td><label for="firstName">First Name</label></td>
                    <td><input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo htmlspecialchars($firstName ?? ''); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="lastName">Last Name</label></td>
                    <td><input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo htmlspecialchars($lastName ?? ''); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email ?? ''); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone</label></td>
                    <td><input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($phone ?? ''); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="vehicleBrand">Vehicle Brand</label></td>
                    <td><input type="text" name="vehicleBrand" id="vehicleBrand" class="form-control" value="<?php echo htmlspecialchars($vehicleBrand ?? ''); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($password ?? ''); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="driverLatitude">Driver Latitude</label></td>
                    <td><input type="text" name="driverLatitude" id="driverLatitude" class="form-control" value="<?php echo htmlspecialchars($driverLatitude ?? ''); ?>" /></td>
                </tr>
                <tr>
                    <td><label for="driverLongitude">Driver Longitude</label></td>
                    <td><input type="text" name="driverLongitude" id="driverLongitude" class="form-control" value="<?php echo htmlspecialchars($driverLongitude ?? ''); ?>" /></td>
                </tr>
            </table>
            <input type="hidden" name="driverId" value="<?php echo htmlspecialchars($driverId ?? ''); ?>" />
            <button type="submit" name="add" class="btn btn-success">Add Driver</button>
            <button type="submit" name="edit" class="btn btn-warning">Edit Driver</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete Driver</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap-4.4.1.bundle.js"></script>
</body>
</html>
