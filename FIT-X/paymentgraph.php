<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fit-X Payment Graph</title>
   <link href="adminstyle.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">  
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <style>
       /* Styling to center the chart and prevent overlap */
       .chart-container {
           width: 90%;  
           max-width: 600px;  
           margin: 50px auto;
           padding: 20px;
           background-color: #E0F7FA; 
           border-radius: 8px;
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
       }
       #paymentChart {
           max-height: 400px;
       }
       .report-button {
           display: block;
           width: 200px;
           margin: 20px auto;
           padding: 10px;
           text-align: center;
           background-color: #4CAF50;
           color: white;
           border: none;
           border-radius: 5px;
           cursor: pointer;
           text-decoration: none;
       }
       .report-button:hover {
           background-color: #45a049;
       }
   </style>
</head>

<body>
	
	<section class="sub-header">
		<nav>
			<a href="index.php"><img src="fit Photos/" alt=""></a>
			<div class="nav-links">
				<ul>
					<li><a href="admin.php">ADMIN HOME PAGE</a></li>
				</ul>
			</div>
		</nav>
		<h1>Transaction Report</h1> <br><br><br><br><br><br><br><br><br><br><br><br>

		<!-- PHP and Chart.js code for displaying the workout type pie chart -->
		<?php
		// Database connection
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

		// Fetch workout type data from tblpayment
		$sql = "SELECT workout_type, COUNT(*) AS count FROM tblpayment GROUP BY workout_type";
		$result = $conn->query($sql);

		$workoutTypes = [];
		$counts = [];

		if ($result->num_rows > 0) {
		    while ($row = $result->fetch_assoc()) {
		        $workoutTypes[] = $row['workout_type'];
		        $counts[] = $row['count'];
		    }
		}

		$conn->close();
		?>

		<div class="chart-container">
		    <canvas id="paymentChart"></canvas>
		</div>

		<script>
		    const ctx = document.getElementById('paymentChart').getContext('2d');
		    const paymentChart = new Chart(ctx, {
		        type: 'pie',
		        data: {
		            labels: <?php echo json_encode($workoutTypes); ?>,
		            datasets: [{
		                label: 'Workout Type Distribution',
		                data: <?php echo json_encode($counts); ?>,
		                backgroundColor: ['#1565C0', '#D32F2F', '#388E3C', '#FBC02D', '#8E24AA'], // Add more colors as needed
		                hoverOffset: 4
		            }]
		        },
		        options: {
		            responsive: true,
		            maintainAspectRatio: false,
		            plugins: {
		                legend: {
		                    position: 'top'
		                },
		                tooltip: {
		                    enabled: true
		                }
		            }
		        }
		    });
		</script>

	</section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Payment Report Button -->
    <a href="generate_payment.php" class="report-button">Payment Report</a>

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
