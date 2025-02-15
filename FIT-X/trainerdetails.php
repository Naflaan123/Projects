<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit-X - Manage Trainer Details</title>
    <link href="adminstyle.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">
    <style>
        .trainer-search, .trainer-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            font-family: 'Poppins', sans-serif;
        }
        .trainer-search form, .trainer-details form {
            width: 300px;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 10px;
        }
        .trainer-search label, .trainer-details label {
            font-weight: 500;
            margin-bottom: 5px;
        }
        .trainer-search input[type="text"], 
        .trainer-details input[type="text"], 
        .trainer-details input[type="password"] { 
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .trainer-search button {
            padding: 8px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        .trainer-search button:hover {
            background-color: #45a049;
        }
        .trainer-details form {
            margin-top: 20px;
            text-align: center;
        }
        .button-container {
            display: flex;
            gap: 10px; /* Space between buttons */
        }
        .button-container .report-button {
    background-color: #007BFF; /* Blue color */
    padding: 8px;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    text-decoration: none; /* Remove underline */
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%; /* Set width to match other buttons */
}

.button-container .report-button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}


    </style>
</head>

<body>
    <section class="sub-header">
        <nav>
            <a href="index.php"><img src="fit Photos/" alt=""></a>
            <div class="nav-links">
                <ul>
                    <li><a href="admin.php">ADMIN MAIN PAGE</a></li>
                </ul>
            </div>
        </nav>
        <h1>Manage Trainer Details</h1>
    </section>

    <!-- Search Form Section -->
    <section class="trainer-search">
        <h2>Search for Trainer Details</h2><br>
        <form action="" method="POST">
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required>
            <button type="submit" name="search">Search</button>
        </form>

        <?php
        $userid = $username = $email = $password = $specialization = "";

        if (isset($_POST['search'])) {
            $userid = $_POST['userid'];
            $conn = new mysqli('localhost', 'root', '', 'fit_x');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT userid, username, email, password, specialization FROM tbltrainers WHERE userid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userid = htmlspecialchars($row['userid']);
                $username = htmlspecialchars($row['username']);
                $email = htmlspecialchars($row['email']);
                $password = htmlspecialchars($row['password']);
                $specialization = htmlspecialchars($row['specialization']);
            } else {
                echo "<p>No trainer found with User ID: " . htmlspecialchars($userid) . "</p>";
            }

            $stmt->close();
            $conn->close();
        }

        if (isset($_POST['add'])) {
            // Handle Add functionality
            $conn = new mysqli('localhost', 'root', '', 'fit_x');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $specialization = $_POST['specialization'];

            $stmt = $conn->prepare("INSERT INTO tbltrainers (username, email, password, specialization) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $password, $specialization);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }

        if (isset($_POST['edit'])) {
            // Handle Edit functionality
            $conn = new mysqli('localhost', 'root', '', 'fit_x');
            $stmt = $conn->prepare("UPDATE tbltrainers SET username=?, email=?, specialization=? WHERE userid=?");
            $stmt->bind_param("ssss", $_POST['username'], $_POST['email'], $_POST['specialization'], $_POST['userid']);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }

        if (isset($_POST['delete'])) {
            // Handle Delete functionality
            $conn = new mysqli('localhost', 'root', '', 'fit_x');
            $stmt = $conn->prepare("DELETE FROM tbltrainers WHERE userid=?");
            $stmt->bind_param("s", $_POST['userid']);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
        ?>

        <!-- Display Editable Trainer Details -->
        <section class="trainer-details">
            <h3>Trainer Details</h3>
            <form action="" method="POST">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>" readonly> <!-- Set to readonly -->
                
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" value="<?php echo $specialization; ?>">
                
                <div class="button-container">
    <button type="submit" name="add">Add</button>
    <button type="submit" name="edit">Edit</button>
    <button type="submit" name="delete">Delete</button>
    <button type="button" class="report-button" style="background-color: #007BFF; color: white;" onclick="window.location.href='manage_trainers.php'">Report</button>


</div>

            </form>
        </section>
    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>At Fit-X, we cater to diverse fitness journeys with personalized workout plans for all levels. Our platform ensures effective and enjoyable fitness experiences, <br> tailored to support your unique health goals. Trust Fit-X for expertly crafted programs that deliver results and keep you motivated.</p>
        
        <span class="col">  
            <a href="index.php"><img src="fit Photos/instagramlogo.png.png" alt="" width="42" height="40" class="img-thumbnail"/></a> 
            <a href="index.php"><img src="fit Photos/twitter.png.png" alt="" width="42" height="40" class="img-thumbnail"/></a>
        </span>
        <span class="col">  
            <a href="index.php"><img src="fit Photos/facebooklogo.png.png" alt="" width="50" height="44" class="img-thumbnail"/></a>
        </span>
        <span class="col">
            <a href="index.php"><img src="fit Photos/youtubelogo.png.png" alt="" width="60" height="40" class="img-thumbnail"/></a>
        </span><br> 
        <div class="social">  
            <p>Get to know more about us</p>
        </div>
        <p>&nbsp;</p>
    </section>
</body>
</html>
