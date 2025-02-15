<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - City Taxi (PVT) Ltd</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        #registration {
            padding: 15px;
            background: #ffffff;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        #registration h1 {
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
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">City Taxi</span> (PVT) Ltd</h1>
            </div>
            <nav>
                <!-- Navigation links can go here -->
            </nav>
        </div>
    </header>

    <section id="registration">
        <div class="container">
            <h1>Register for City Taxi</h1>
            <?php
                session_start(); // Start the session

                // Initialize variables for error and success handling
                $error_message = '';
                $success_message = '';
                $latestMessage = '';

                // Check if form was submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Handle Registration
                    if (isset($_POST['register'])) {
                        $firstName = $_POST['first-name'];
                        $lastName = $_POST['last-name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $confirmPassword = $_POST['confirm-password'];

                        // Basic validation
                        if ($password !== $confirmPassword) {
                            $error_message = "Passwords do not match!";
                        } else {
                            // Connect to the database
                            $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Prepare the SQL statement to avoid SQL injection
                            $stmt = $conn->prepare("INSERT INTO tblPassenger (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)");
                            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                            $stmt->bind_param('ssss', $firstName, $lastName, $email, $hashed_password);

                            if ($stmt->execute()) {
                                $success_message = "Registration successful! You can now log in.";
                            } else {
                                $error_message = "Error: " . $stmt->error;
                            }

                            // Close the connection
                            $stmt->close();
                            $conn->close();
                        }
                    } 
                    
                    // Handle Login
                    if (isset($_POST['login'])) {
                        $email = $_POST['login-email'];
                        $password = $_POST['login-password'];

                        // Connect to the database
                        $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Prepare the SQL statement to find the passenger
                        $stmt = $conn->prepare("SELECT PassengerID, Password FROM tblPassenger WHERE Email = ?");
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $stmt->store_result();
                        
                        if ($stmt->num_rows > 0) {
                            $stmt->bind_result($passengerID, $hashed_password);
                            $stmt->fetch();

                            // Verify the password
                            if (password_verify($password, $hashed_password)) {
                                // Store the PassengerID in session
                                $_SESSION['passengerID'] = $passengerID;

                                // Redirect to the home page (index.php)
                                header('Location: index.php'); // Redirect to your index page
                                exit();
                            } else {
                                $error_message = "Invalid email or password.";
                            }
                        } else {
                            $error_message = "No user found with that email.";
                        }

                        // Close the connection
                        $stmt->close();
                        $conn->close();
                    }

                    // Handle Show Message
                    if (isset($_POST['show-message'])) {
                        // Connect to the database
                        $conn = new mysqli('localhost', 'root', '', 'City-Taxi');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch the latest message from tblmsg
                        $result = $conn->query("SELECT message FROM tblmsg ORDER BY msgID DESC LIMIT 1");
                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $latestMessage = $row['message'];
                        } else {
                            $latestMessage = "No messages found.";
                        }

                        // Close the connection
                        $conn->close();
                    }
                }
            ?>

            <!-- Display error or success messages -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>

            <!-- Registration Form -->
            <form action="city-taxi-registration-page.php" method="post">
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

                <div class="form-group">
                    <button type="submit" name="register">Register</button>
                </div>
            </form>

            <hr>

            <!-- Login Form -->
            <h2>Login</h2>
            <form action="city-taxi-registration-page.php" method="post">
                <div class="form-group">
                    <label for="login-email">Email Address:</label>
                    <input type="email" id="login-email" name="login-email" required>
                </div>

                <div class="form-group">
                    <label for="login-password">Password:</label>
                    <input type="password" id="login-password" name="login-password" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="login">Login</button>
                </div>
            </form>

            <!-- Button to show latest message -->
            <div class="form-group">
                <form action="city-taxi-registration-page.php" method="post">
                    <button type="submit" name="show-message" class="btn btn-primary">Show Latest Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Latest Message Modal -->
    <div class="modal fade" id="latestMessageModal" tabindex="-1" role="dialog" aria-labelledby="latestMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="latestMessageModalLabel">Latest Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (!empty($latestMessage)): ?>
                        <?php echo $latestMessage; ?>
                    <?php else: ?>
                        No new messages.
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 City Taxi (PVT) Ltd</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            <?php if (!empty($latestMessage)): ?>
                $('#latestMessageModal').modal('show');
            <?php endif; ?>
        });
    </script>
</body>
</html>
