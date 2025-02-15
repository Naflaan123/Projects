<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit_x";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is set to avoid undefined array key warnings
if (isset($_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['Specialization'], $_FILES['certificate'])) {
    // Get form data
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $specialization = $_POST['Specialization'];

    // Handle the file upload
    $certificate = $_FILES['certificate'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($certificate["name"]);

    // Check if the file is an image
    $check = getimagesize($certificate["tmp_name"]);
    if($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($certificate["tmp_name"], $target_file)) {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO tbltrainers (Username, Email, Password, Specialization, Certificate) VALUES (?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind parameters including the certificate path
            $stmt->bind_param("sssss", $username, $email, $password, $specialization, $target_file);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error uploading the certificate.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "Error: Please fill in all required fields.";
}

$conn->close();
?>
