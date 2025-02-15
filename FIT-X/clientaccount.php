<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fit-X</title>
   <link href="style.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">
   <style>
       body {
           font-family: 'Poppins', sans-serif;
           margin: 0;
           padding: 0;
           display: flex;
           flex-direction: column;
           align-items: center;
       }

       .prog {
           text-align: center;
           padding: 20px;
       }

       .account-info {
           display: flex;
           flex-direction: column;
           align-items: center;
           justify-content: center;
           margin-top: 20px;
           width: 100%;
           max-width: 400px;
       }

       .info-item {
           display: flex;
           flex-direction: column;
           margin: 10px 0;
           width: 100%;
       }

       label {
           margin-bottom: 5px;
       }

       input, select {
           padding: 10px;
           border: 1px solid #ccc;
           border-radius: 5px;
           width: 100%;
           box-sizing: border-box; /* Ensures padding doesn't affect overall width */
           background-color: #f9f9f9; /* Light background for uneditable fields */
       }

       .footer {
           text-align: center;
           margin-top: 20px;
           padding: 20px;
           background-color: #f2f2f2;
           width: 100%;
       }

       .social a {
           margin: 0 10px;
       }

       .img-thumbnail {
           vertical-align: middle;
       }
   </style>
</head>

<body>
    <section class="prog">
        <nav>
            <a href="index.php"><img src="fit Photos/" alt=""></a>
            <div class="nav-links">
                <ul>
                <li><a href="index.php">HOME</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="programs.php">PROGRAMS</a></li>
					<li><a href="kk.php">CART</a></li>
                    <li><a href="chatbotAI - fit/chatindex.php">CHAT</a></li> <!-- Updated href here -->
					<li><a href="tracking.php">TRACK</a></li>
				    <li><a href="clientaccount.php">ACCOUNT</a></li> 

                </ul>
            </div>
        </nav>
        <h1>YOUR ACCOUNT</h1>
    </section>
    
    <!-- Personal Account Information Section -->
    <div class="account-info">
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

        // Fetch the latest user details from the tblclient table
        $sql = "SELECT userId, username, email, gender FROM tblclient ORDER BY userId DESC LIMIT 1"; // Fetch latest entry
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of the latest row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="info-item">';
                echo '<label for="userId">User ID:</label>';
                echo '<input type="text" id="userId" name="userId" value="' . htmlspecialchars($row["userId"]) . '" disabled>';
                echo '</div>';
                echo '<div class="info-item">';
                echo '<label for="username">Username:</label>';
                echo '<input type="text" id="username" name="username" value="' . htmlspecialchars($row["username"]) . '" disabled>';
                echo '</div>';
                echo '<div class="info-item">';
                echo '<label for="email">Email:</label>';
                echo '<input type="email" id="email" name="email" value="' . htmlspecialchars($row["email"]) . '" disabled>';
                echo '</div>';
                echo '<div class="info-item">';
                echo '<label for="gender">Gender:</label>';
                echo '<input type="text" id="gender" name="gender" value="' . htmlspecialchars($row["gender"]) . '" disabled>';
                echo '</div>';
            }
        } else {
            echo "No user found.";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>

    <section class="footer">
        <h4>About Us</h4>
        <p>At Fit-X, we cater to diverse fitness journeys with personalized workout plans for all levels. Our platform ensures effective and enjoyable fitness experiences,<br> tailored to support your unique health goals. Trust Fit-X for expertly crafted programs that deliver results and keep you motivated.</p>
        <div class="social">
            <a href="index.php"><img src="fit Photos/instagramlogo.png.png" alt="" width="42" height="40" class="img-thumbnail"/></a>
            <a href="index.php"><img src="fit Photos/twitter.png.png" alt="" width="42" height="40" class="img-thumbnail"/></a>
            <a href="index.php"><img src="fit Photos/facebooklogo.png.png" alt="" width="50" height="44" class="img-thumbnail"/></a>
            <a href="index.php"><img src="fit Photos/youtubelogo.png.png" alt="" width="60" height="40" class="img-thumbnail"/></a>
        </div>
        <p>Get to know more about us</p>
    </section>
</body>
</html>
