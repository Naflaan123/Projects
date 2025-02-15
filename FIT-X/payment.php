<?php
session_start(); // Start the session

// Assuming user ID is stored in session after login
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : ''; // Get the user ID from session

// Initialize or increment amount in session
if (!isset($_SESSION['amount'])) {
    $_SESSION['amount'] = 189; // Set initial price
} else {
    $_SESSION['amount'] += 1; // Increment amount by 1 for each new login
}
$amount = $_SESSION['amount']; // Get the current amount
?>
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
       /* Additional styling for the payment form */
       .payment-form {
           max-width: 500px;
           margin: 20px auto;
           padding: 20px;
           border: 1px solid #ddd;
           border-radius: 10px;
           background-color: #f9f9f9;
           box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
       }

       .form-group {
           margin-bottom: 15px;
       }

       .form-group label {
           display: block;
           margin-bottom: 5px;
           font-weight: bold;
       }

       .form-group input,
       .form-group select {
           width: 100%;
           padding: 10px;
           border: 1px solid #ccc;
           border-radius: 5px;
           font-size: 16px;
       }

       button {
           background-color: #28a745;
           color: white;
           padding: 10px 15px;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           font-size: 16px;
           transition: background-color 0.3s ease;
       }

       button:hover {
           background-color: #218838;
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
                    <li><a href="chatbotAI - fit/chatindex.php">CHAT</a></li>
                    <li><a href="clientaccount.php">ACCOUNT</a></li> 
                </ul>
            </div>
        </nav>
        <h1>PAYMENT</h1>
    </section>

    <!-- Payment Form Section -->
    <section class="payment-form">
        <h2>Complete Your Payment</h2>
        <form action="process_payment.php" method="POST">
            <div class="form-group">
                <label for="userid">User ID:</label>
                <input type="number" id="userid" name="userid" value="<?php echo htmlspecialchars($userid); ?>" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" value="<?php echo $amount; ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="paymentmethod">Payment Method:</label>
                <select id="paymentmethod" name="paymentmethod" required>
                    <option value="">Select Payment Method</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="workout_type">Workout Type:</label>
                <select name="workout_type" required>
                    <option value="">Select Workout Type</option>
                    <option value="Cardio">Cardio</option>
                    <option value="Strength & Conditioning">Strength & Conditioning</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Calisthenics">Calisthenics</option>
                    <option value="Home Workouts">Home Workouts</option>
                </select>
            </div>
            <button type="submit">Buy</button>
        </form>
    </section>

    <section class="footer">
        <h4>About Us</h4>
        <p>At Fit-X, we cater to diverse fitness journeys with personalized workout plans for all levels. Our platform ensures effective and enjoyable fitness experiences, <br> tailored to support your unique health goals. Trust Fit-X for expertly crafted programs that deliver results and keep you motivated.</p>
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
