<?php
// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "fit_x"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from tbltrainers
$sql = "SELECT UserID, Username, Email, Password, Specialization, Certificate, Accepted FROM tbltrainers"; // Ensure 'Accepted' is the correct column name
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Page</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional CSS file -->
    <style>
        /* Table styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50; /* Green background for the header */
            color: white; /* White text for the header */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray background for even rows */
        }
        tr:hover {
            background-color: #ddd; /* Light gray background on hover */
        }
        button {
            padding: 5px 10px;
            background-color: #4CAF50; /* Green background for buttons */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trainer Permissions</h1>
        <table>
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Specialization</th>
                <th>Certificate</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["UserID"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Username"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["Email"]) . "</td>";
                    // Display password as bullets
                    echo "<td><input type='password' value='" . htmlspecialchars($row["Password"]) . "' readonly style='border:none; background:none;'></td>";
                    echo "<td>" . htmlspecialchars($row["Specialization"]) . "</td>";
                    
                    // Check if Certificate is not null
                    if (!empty($row["Certificate"])) {
                        echo "<td><a href='view_certificate.php?certificate=" . urlencode(basename($row["Certificate"])) . "' target='_blank'>View Certificate</a></td>";
                    } else {
                        echo "<td>No Certificate</td>";
                    }

                    echo "<td><button onclick='acceptTrainer(" . htmlspecialchars($row["UserID"]) . ")'>Accept</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No trainers found</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        function acceptTrainer(userId) {
            if (confirm('Are you sure you want to accept this trainer?')) {
                // Send a request to accept the trainer
                fetch('accept_trainer.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ userId: userId })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload(); // Reload the page to see the changes
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
