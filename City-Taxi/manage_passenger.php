<?php 
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$passengerId = '';
$firstName = '';
$lastName = '';
$email = '';
$registrationDate = '';
$message = '';
$sentMessage = '';

// Handle search request
if (isset($_POST['search'])) {
    $passengerId = $_POST['passengerId'];
    
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM tblpassenger WHERE PassengerID = ?");
    $stmt->bind_param("i", $passengerId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $email = $row['Email'];
        $registrationDate = $row['RegistrationDate'];
    } else {
        $message = "Passenger not found.";
    }
    $stmt->close();
}

// Handle edit request
if (isset($_POST['edit'])) {
    $passengerId = $_POST['passengerId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $registrationDate = $_POST['registrationDate'];

    // Prepare and execute the update SQL statement
    $updateStmt = $conn->prepare("UPDATE tblpassenger SET FirstName = ?, LastName = ?, Email = ?, RegistrationDate = ? WHERE PassengerID = ?");
    $updateStmt->bind_param("ssssi", $firstName, $lastName, $email, $registrationDate, $passengerId);
    $updateStmt->execute();
    $updateStmt->close();
    
    $message = "Passenger details updated successfully!";
}

// Handle delete request
if (isset($_POST['delete'])) {
    $passengerId = $_POST['passengerId'];

    // Prepare and execute the delete SQL statement
    $deleteStmt = $conn->prepare("DELETE FROM tblpassenger WHERE PassengerID = ?");
    $deleteStmt->bind_param("i", $passengerId);
    $deleteStmt->execute();
    $deleteStmt->close();
    
    $message = "Passenger deleted successfully!";
}

// Handle send message request
if (isset($_POST['sendMessage'])) {
    $messageContent = $_POST['messageContent'];
    
    // Prepare and execute the insert SQL statement for the message
    $insertStmt = $conn->prepare("INSERT INTO tblmsg (message) VALUES (?)");
    $insertStmt->bind_param("s", $messageContent);
    $insertStmt->execute();
    $insertStmt->close();

    $sentMessage = "Message sent successfully!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Passenger</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="adminstyles.css" rel="stylesheet" type="text/css"> <!-- Adjust based on your actual styles -->
    <style>
        body {
            background-color: lightblue; /* Set background color to light blue */
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
        <h1 class="text-center">Manage Passenger</h1>
        <?php if ($message): ?>
            <p class='text-center text-success'><?php echo $message; ?></p>
        <?php endif; ?>
        <?php if ($sentMessage): ?>
            <p class='text-center text-success'><?php echo $sentMessage; ?></p>
        <?php endif; ?>

        <form id="searchForm" name="searchForm" method="post" action="">
            <div class="form-group">
                <label for="passengerId">Passenger ID</label>
                <input type="text" name="passengerId" id="passengerId" class="form-control" value="<?php echo htmlspecialchars($passengerId); ?>" required />
            </div>
            <button type="submit" name="search" class="btn btn-primary">Search</button>
        </form>

        <form id="passengerForm" name="passengerForm" method="post" action="">
            <table class="table table-bordered mt-4">
                <tr>
                    <td><label for="firstName">First Name</label></td>
                    <td><input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo htmlspecialchars($firstName); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="lastName">Last Name</label></td>
                    <td><input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo htmlspecialchars($lastName); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required /></td>
                </tr>
                <tr>
                    <td><label for="registrationDate">Registration Date</label></td>
                    <td><input type="date" name="registrationDate" id="registrationDate" class="form-control" value="<?php echo htmlspecialchars($registrationDate); ?>" required /></td>
                </tr>
            </table>
            <input type="hidden" name="passengerId" value="<?php echo htmlspecialchars($passengerId); ?>" />
            
            <div class="form-row">
                <div class="col">
                    <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </div>
                
                <div class="col text-right">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#messageModal">Send Message</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal for Sending Message -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="messageContent">Type Message</label>
                            <textarea name="messageContent" id="messageContent" class="form-control" rows="4" required></textarea>
                        </div>
                        <input type="hidden" name="passengerId" value="<?php echo htmlspecialchars($passengerId); ?>" />
                        <button type="submit" name="sendMessage" class="btn btn-primary">Submit</button>
                    </form>
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

</body>
</html>
