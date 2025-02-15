<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Page</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <style>
        .bill {
            padding: 20px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> 
            </button>
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <a class="nav-link" href="Contactus.php">Contact us</a>
                <a class="nav-link" href="Flavours.php">Models</a>
                <a class="nav-link" href="History.php">History</a>
                <ul class="navbar-nav mr-auto"></ul>
            </div>
        </nav>

        <br><br><br><br><br>

        <h1 class="text-center">Payment Page</h1>
        <p class="text-center">Enter payment details below</p>

        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Initialize BookingID and PaymentID
        $bookingID = isset($_GET['booking_id']) ? $_GET['booking_id'] : '';

        // Fetch the latest PaymentID
        $result = $conn->query("SELECT MAX(PaymentID) AS MaxPaymentID FROM tblpayment");
        $row = $result->fetch_assoc();
        $paymentID = $row['MaxPaymentID'] + 1; // Increment to get the new PaymentID

        // Fetch the latest Amount
        $resultAmount = $conn->query("SELECT Amount FROM tblpayment ORDER BY PaymentID DESC LIMIT 1");
        $rowAmount = $resultAmount->fetch_assoc();
        $startingAmount = isset($rowAmount['Amount']) ? $rowAmount['Amount'] + 1 : 300; // Start from 300

        // Initialize variables for display
        $showModal = false;
        $billDetails = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect form data
            $amount = $_POST['txtAmount'];
            $paymentMethod = $_POST['lstPaymentMethod'];
            $paymentDateTime = $_POST['txtPaymentDateTime'];
            $driverNotified = $_POST['lstDriverNotified'];

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO tblpayment (PaymentID, BookingID, Amount, PaymentMethod, PaymentDateTime, DriverNotified) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissss", $paymentID, $bookingID, $amount, $paymentMethod, $paymentDateTime, $driverNotified);

            // Execute the statement
            if ($stmt->execute()) {
                // Store bill details for display
                $billDetails = [
                    'Payment ID' => $paymentID,
                    'Booking ID' => $bookingID,
                    'Amount' => $amount,
                    'Payment Method' => $paymentMethod,
                    'Payment Date & Time' => $paymentDateTime,
                    'Driver Notified' => $driverNotified
                ];
                $showModal = true; // Flag to show modal

                // Add the JavaScript alert message here
                echo "<script>alert('Payment successfully submitted!');</script>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            // Close the statement
            $stmt->close();
        }

        // Close the connection
        $conn->close();
        ?>

        <form id="form1" name="form1" method="post" action="">
            <table width="507" border="0" align="center">
                <tr>
                    <td width="205">Payment ID (Primary Key)</td>
                    <td width="292"><input type="text" name="txtPaymentID" id="txtPaymentID" value="<?php echo $paymentID; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Booking ID</td>
                    <td><input type="text" name="txtBookingID" id="txtBookingID" value="<?php echo $bookingID; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input type="text" name="txtAmount" id="txtAmount" value="<?php echo $startingAmount; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Payment Method</td>
                    <td>
                        <select name="lstPaymentMethod" id="lstPaymentMethod" required>
                            <option value="Card">Card</option>
                            <option value="Cash">Cash</option>
                            <option value="Online">Online</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Payment Date & Time</td>
                    <td><input type="datetime-local" name="txtPaymentDateTime" id="txtPaymentDateTime" required /></td>
                </tr>
                <tr>
                    <td>Driver Notified</td>
                    <td>
                        <select name="lstDriverNotified" id="lstDriverNotified" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit Payment" class="btn btn-primary" />
                        <input type="reset" name="btnReset" id="btnReset" value="Cancel" class="btn btn-secondary" />
                    </td>
                </tr>
            </table>
        </form>

        <!-- Modal for Payment Bill -->
        <?php if ($showModal): ?>
            <div class="modal fade" id="paymentBillModal" tabindex="-1" role="dialog" aria-labelledby="paymentBillModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentBillModalLabel">Payment Bill</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="bill">
                                <ul class="list-unstyled">
                                    <?php foreach ($billDetails as $key => $value): ?>
                                        <li><strong><?php echo $key; ?>:</strong> <?php echo $value; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $('#paymentBillModal').modal('show');
                });
            </script>
        <?php endif; ?>

    </div>

    <br><br><br><br><br><br><br><br><br>
    
    <footer>
        <div class="row">
            <div class="col-lg-12 text-center">
                Copyright &copy; 2022 All rights reserved
            </div>
        </div>
    </footer>

</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
