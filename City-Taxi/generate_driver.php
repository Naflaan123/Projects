<?php 
// Database connection settings
$servername = "localhost"; // Server name
$username = "root";         // Database username
$password = "";             // Database password (none in this case)
$dbname = "city-taxi";      // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch driver data
$sql = "SELECT driver_id, first_name, last_name, phone, vehicle_brand, email FROM tbldriver"; // Adjust the table name if necessary
$result = $conn->query($sql);

// Output CSS styles for the page
echo "<style>
    body {
        font-family: Arial, sans-serif; /* Set font family */
        background-color: #f4f4f4; /* Light gray background */
        margin: 0;
        padding: 20px; /* Add padding */
    }
    h2 {
        text-align: center; /* Center the heading */
        color: #333; /* Darker color for the heading */
    }
    table {
        width: 100%; /* Set table width to 100% */
        border-collapse: collapse; /* Remove spacing between borders */
        margin-top: 20px; /* Space above the table */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        background-color: #fff; /* White background for the table */
    }
    th, td {
        padding: 12px; /* Add padding for cells */
        text-align: left; /* Align text to the left */
        border: 1px solid #ddd; /* Add border to cells */
    }
    th {
        background-color: #007BFF; /* Bootstrap primary color */
        color: white; /* White text for headers */
    }
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Zebra striping for rows */
    }
    tr:hover {
        background-color: #f1f1f1; /* Highlight row on hover */
    }
    .button {
        display: inline-block; /* Inline block for the button */
        padding: 10px 15px; /* Button padding */
        font-size: 16px; /* Button text size */
        cursor: pointer; /* Pointer cursor */
        text-decoration: none; /* No underline */
        background-color: #007BFF; /* Button color */
        color: white; /* Button text color */
        border: none; /* No border */
        border-radius: 5px; /* Rounded corners */
        margin-top: 20px; /* Margin above the button */
    }
    .button:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }
</style>";

// Check if there are drivers
if ($result->num_rows > 0) { 
    // Output data in a tabular format
    echo "<h2>Driver Report</h2>"; 
    echo "<table>"; // Start the table
    echo "<tr><th>Driver ID</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Vehicle</th><th>Email</th></tr>"; // Table headers

    // Fetch and display each driver's data 
    while ($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo "<td>" . $row['driver_id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['vehicle_brand'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>"; // End the table
} else { 
    echo "<h2>No Drivers Found</h2>"; 
}

// Back button to return to admin interface
echo '<br>'; // Add some space
echo '<a href="admininterface.php" class="button">Back</a>';

// Close the database connection
$conn->close();
?> 
