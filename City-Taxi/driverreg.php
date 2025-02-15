<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Registration - City Taxi (PVT) Ltd</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 3px solid;
        }
        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            margin: 0;
            list-style: none;
            overflow: hidden;
        }
        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }
        header #branding {
            float: left;
        }
        header #branding h1 {
            margin: 0;
        }
        header nav {
            float: right;
            margin-top: 10px;
        }
        header .highlight, header .current a {
            color: #e8491d;
            font-weight: bold;
        }
        header a:hover {
            color: #cccccc;
            font-weight: bold;
        }
        #registration, #login {
            padding: 15px;
            background: #ffffff;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        #registration h1, #login h1 {
            text-align: center;
            color: #35424a;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="tel"],
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #e8491d;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #f16b4d;
        }
        footer {
            padding: 20px;
            margin-top: 20px;
            color: #ffffff;
            background-color: #e8491d;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $phone = $_POST['phone'];
    $vehicleBrand = $_POST['vehicle-brand'];
    $vehicleModel = $_POST['vehicle-model'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Insert into database
    $sql = "INSERT INTO tblDriver (first_name, last_name, phone, vehicle_brand, vehicle_model, email, password)
            VALUES ('$firstName', '$lastName', '$phone', '$vehicleBrand', '$vehicleModel', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='container'><p>Registration successful!</p></div>";
    } else {
        echo "<div class='container'><p>Error: " . $sql . "<br>" . $conn->error . "</p></div>";
    }

    // Close connection
    $conn->close();
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get login data
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    // Check email and password
    $sql = "SELECT * FROM tblDriver WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful
            session_start();
            $_SESSION['driver_id'] = $row['driver_id']; // Store driver ID in session
            header("Location: driverinterface.php");
            exit();
        } else {
            echo "<div class='container'><p>Invalid password.</p></div>";
        }
    } else {
        echo "<div class='container'><p>No user found with this email.</p></div>";
    }

    // Close connection
    $conn->close();
}
?>

<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">City Taxi</span> (PVT) Ltd</h1>
        </div>
        <nav></nav>
    </div>
</header>

<section id="registration">
    <div class="container">
        <h1>Register as a Driver</h1>
        <form action="driverreg.php" method="post">
            <!-- First Name -->
            <div class="form-group">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <!-- Vehicle Brand -->
            <div class="form-group">
                <label for="vehicle-brand">Vehicle Brand:</label>
                <input type="text" id="vehicle-brand" name="vehicle-brand" required>
            </div>

            <!-- Vehicle Model -->
            <div class="form-group">
                <label for="vehicle-model">Vehicle Model:</label>
                <input type="text" id="vehicle-model" name="vehicle-model" required>
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" name="register">Register</button>
            </div>
        </form>
    </div>
</section>

<section id="login">
    <div class="container">
        <h1>Driver Login</h1>
        <form action="driverreg.php" method="post">
            <!-- Email Address -->
            <div class="form-group">
                <label for="login-email">Email Address:</label>
                <input type="email" id="login-email" name="login-email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="login-password" required>
            </div>

            <!-- Login Button -->
            <div class="form-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</section>

<footer>
    <p>City Taxi (PVT) Ltd, Copyright &copy; 2024</p>
</footer>

</body>
</html>
