<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fit-X</title>
   <link href="style.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">  
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <style>
      /* Styling to center the chart and prevent overlap */
      .chart-container {
           width: 90%;  /* Increased width */
           max-width: 600px;  /* Increased max width */
           margin: 50px auto;
           padding: 20px;
           background-color: #E0F7FA; /* Light blue background */
           border-radius: 8px;
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
       }
       #genderChart {
           max-height: 400px; /* Increased max height */
       }
       .button-container {
           text-align: center; /* Center align the button */
           margin: 20px 0; /* Spacing around the button */
       }
       .button {
           background-color: #1565C0; /* Button color */
           color: white; /* Button text color */
           padding: 10px 20px; /* Padding for the button */
           border: none; /* No border */
           border-radius: 5px; /* Rounded corners */
           cursor: pointer; /* Pointer cursor on hover */
           font-size: 16px; /* Font size */
       }
       .button:hover {
           background-color: #0D47A1; /* Darker color on hover */
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
		<h1>Client Graph</h1> <br><br><br><br><br><br><br><br><br><br><br><br>

		<!-- PHP and Chart.js code for displaying the male-to-female ratio pie chart -->
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

		// Fetch gender data from tblclient
		$sql = "SELECT gender, COUNT(*) AS count FROM tblclient GROUP BY gender";
		$result = $conn->query($sql);

		$maleCount = 0;
		$femaleCount = 0;

		if ($result->num_rows > 0) {
		    while ($row = $result->fetch_assoc()) {
		        if (strtolower($row['gender']) == 'male') {
		            $maleCount = $row['count'];
		        } elseif (strtolower($row['gender']) == 'female') {
		            $femaleCount = $row['count'];
		        }
		    }
		}

		$conn->close();
		?>

		<div class="chart-container">
		    <canvas id="genderChart"></canvas>
		</div>

		<script>
		    const ctx = document.getElementById('genderChart').getContext('2d');
		    const genderChart = new Chart(ctx, {
		        type: 'pie',
		        data: {
		            labels: ['Male', 'Female'],
		            datasets: [{
		                label: 'Gender Ratio',
		                data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
		                backgroundColor: ['#1565C0', '#D32F2F'], // Darker colors for the chart
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

		<!-- Button to generate client report -->
		<div class="button-container">
		    <button class="button" onclick="window.location.href='generate_client.php'">Client Report</button>
			<button class="button" onclick="window.location.href='generate_payment.php'">Transaction </button>
		</div>

	</section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
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
