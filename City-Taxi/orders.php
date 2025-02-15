<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'City-Taxi');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pending orders from the database
$query = "SELECT BookingID, Name, PickupLocation, DropLocation, status FROM tblbooking WHERE status = 'Pending'";
$result = $conn->query($query);

// Check if there are any pending orders
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="driverstyles.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container-fluid">
    <div class="container">
        <h1 class="text-center">Orders</h1>
        <p class="text-center">Here are the pending orders:</p>

        <?php if ($result && $result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Passenger Name</th>
                        <th>Pickup Location</th>
                        <th>Drop-off Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['BookingID']); ?></td>
                        <td><?php echo htmlspecialchars($order['Name']); ?></td>
                        <td><?php echo htmlspecialchars($order['PickupLocation']); ?></td>
                        <td><?php echo htmlspecialchars($order['DropLocation']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td>
                            <form action="accept_order.php" method="post">
                                <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($order['BookingID']); ?>">
                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No pending orders</p>
        <?php endif; ?>

    </div>

    <footer class="text-center mt-5">
        <div class="row">
            <div class="col-lg-12">
                Copyright © 2024 All rights reserved
            </div>
        </div>
    </footer>
</div>

</body>
</html>

<?php
$conn->close();
?>
