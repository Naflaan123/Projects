<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - City Taxi (PVT) Ltd</title>
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
        #login {
            padding: 15px;
            background: #ffffff;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        #login h1 {
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
        .form-group input[type="password"] {
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
        .form-footer {
            text-align: center;
            margin-top: 15px;
        }
        .form-footer a {
            color: #35424a;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
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
        // Initialize variables to hold error messages
        $usernameErr = $passwordErr = "";
        $username = $password = "";

        // Process form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
            } else {
                $username = htmlspecialchars($_POST["username"]);
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = htmlspecialchars($_POST["password"]);
            }

            // If no errors, handle login logic
            if (empty($usernameErr) && empty($passwordErr)) {
                // Admin login check
                if ($username == "admin" && $password == "admin123") {
                    // Redirect to admin interface
                    header("Location: admininterface.php");
                    exit();
                } else {
                    // For simplicity, assume other users login successfully (add your own login logic here)
                    echo "<p style='text-align:center; color: green;'>Login successful!</p>";
                }
            }
        }
    ?>

    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">City Taxi</span> (PVT) Ltd</h1>
            </div>
            <nav>
                
            </nav>
        </div>
    </header>

    <section id="login">
        <div class="container">
            <h1>Admin</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                    <span style="color:red;"><?php echo $usernameErr; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <span style="color:red;"><?php echo $passwordErr; ?></span>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
                
            </form>
        </div>
    </section>
    <br><br><br><br>
    <footer>
        <p>City Taxi (PVT) Ltd, Copyright &copy; 2024</p>
    </footer>
</body>
</html>
