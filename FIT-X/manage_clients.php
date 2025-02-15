<?php
// manage_clients.php
// Database connection settings
$servername = "localhost"; // Update this with your server name
$username = "root";        // Update this with your username
$password = "";            // Update this with your password
$dbname = "fit_x";         // Update this with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all client details from the tblclient table
$sql = "SELECT userid, username, email, password, gender FROM tblclient";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Clients - Fit-X</title>
   <link href="adminstyle.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">
   <style>
       body {
           font-family: 'Poppins', sans-serif;
           margin: 0;
           padding: 20px;
           text-align: center; /* Center align text */
           background-color: #f9f9f9; /* Light background for the body */
       }
       h2 {
           margin-bottom: 20px;
           color: #333; /* Darker color for better contrast */
       }
       table {
           margin: 20px auto; /* Center the table */
           border-collapse: collapse;
           width: 80%; /* Adjust the width of the table */
           box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for the table */
           border-radius: 5px; /* Rounded corners */
           overflow: hidden; /* Round corners */
       }
       th, td {
           padding: 12px;
           text-align: left;
           color: #555; /* Slightly lighter text color */
       }
       th {
           background-color: #007BFF; /* Blue background for header */
           color: white; /* White text color for header */
           font-weight: 600; /* Bold font weight for headers */
       }
       tr:nth-child(even) {
           background-color: #f2f2f2; /* Zebra striping for even rows */
       }
       tr:hover {
           background-color: #e0f7fa; /* Light blue on hover */
       }
       .footer {
           margin-top: 40px;
           padding: 10px;
           background-color: #f2f2f2; /* Light background for footer */
           text-align: center; /* Center footer text */
       }
       .footer img {
           margin: 0 10px; /* Space out icons */
       }
   </style>
</head>

<body>
    <h2>Client Report</h2>
    <section class="client-report">
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>User ID</th><th>Username</th><th>Email</th><th>Password</th><th>Gender</th></tr>";
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["userid"]) . "</td>
                    <td>" . htmlspecialchars($row["username"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["password"]) . "</td>
                    <td>" . htmlspecialchars($row["gender"]) . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No client data available.</p>";
        }
        ?>
    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>At Fit-X, we cater to diverse fitness journeys with personalized workout plans for all levels...</p>
        <span class="col">
            <a href="index.php"><img src="fit Photos/instagramlogo.png.png" alt="" width="42" height="40" class="img-thumbnail"/></a> 
            <a href="index.php"><img src="fit Photos/twitter.png.png" alt="" width="42" height="40" class="img-thumbnail"/></a>
        </span>
        <span class="col">
            <a href="index.php"><img src="fit Photos/facebooklogo.png.png" alt="" width="50" height="44" class="img-thumbnail"/></a>
        </span>
        <span class="col">
            <a href="index.php"><img src="fit Photos/youtubelogo.png.png" alt="" width="60" height="40" class="img-thumbnail"/></a>
        </span>
    </section>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
