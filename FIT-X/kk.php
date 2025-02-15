<!doctype html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fit-X</title>
   <link href="style.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">  
   <style>
       /* General page styling */
       body {
           background-color: #FFFFFF; /* Gray background color */
           font-family: Arial, sans-serif;
           padding: 20px;
       }

       h2 {
           color: #333;
           text-align: center; /* Center the title */
       }

       /* CSS grid for product display */
       .product-grid {
           display: grid;
           grid-template-columns: repeat(3, 1fr); /* 3 columns */
           gap: 20px;
           margin-bottom: 40px;
       }

       .product-item {
           border: 1px solid #ccc;
           padding: 10px;
           background-color: #fff;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           text-align: center;
       }

       .product-item img {
           width: 200px;
           height: 200px;
           object-fit: cover;
           margin-bottom: 10px;
       }

       .product-item h3 {
           margin: 10px 0;
           color: #333;
       }

       .product-item p {
           margin: 5px 0;
           color: #666;
       }

       .product-item button {
           background-color: #28a745; /* Green color for buttons */
           color: #fff;
           padding: 10px 20px;
           border: none;
           cursor: pointer;
           font-size: 16px;
       }

       .product-item button:hover {
           background-color: #218838; /* Darker green on hover */
       }

       /* Cart table */
       table {
           width: 100%;
           margin-top: 20px;
           border-collapse: collapse;
       }

       table, th, td {
           border: 1px solid #000;
       }

       th, td {
           padding: 10px;
           text-align: center;
       }

       th {
           background-color: #f2f2f2;
       }

       /* Style for remove button in the cart */
       button.remove-btn {
           background-color: #28a745;
           color: white;
           border: none;
           padding: 5px 10px;
           cursor: pointer;
       }

       button.remove-btn:hover {
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
                    <li><a href="chatbotAI - fit/chatindex.php">CHAT</a></li> <!-- Updated href here -->
					<li><a href="tracking.php">TRACK</a></li>
				    <li><a href="clientaccount.php">ACCOUNT</a></li> 

				</ul>
			</div>
		</nav>
		<h1>Add to Cart</h1>
	</section>

    <?php
    // Database connection
    $connect = mysqli_connect("localhost", "root", "", "fit_x");

    // Check connection
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from tblitems (assumed table name; change it if necessary)
    $query = "SELECT * FROM tblitems";
    $result = mysqli_query($connect, $query);
    ?>

    <br><br>

    <?php
    // Check if any items are returned
    if (mysqli_num_rows($result) > 0) {
    ?>
        <!-- Grid container for product items -->
        <div class="product-grid">
        <?php
        // Loop through the items and display them in the grid
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="product-item">
                <img src="<?php echo $row['imagePath']; ?>" alt="Product Image">
                <h3><?php echo $row['productName']; ?></h3>
                <p>Price: $<?php echo $row['item_price']; ?></p>
                <p><?php echo isset($row['description']) ? $row['description'] : "No description available."; ?></p>
                <button onclick="addToCart(
                    '<?php echo $row['advertisementID']; ?>', 
                    '<?php echo addslashes($row['productName']); ?>', 
                    '<?php echo $row['item_price']; ?>', 
                    '<?php echo $row['imagePath']; ?>'
                )">Add To Cart</button>
            </div>
        <?php
        }
        ?>
        </div>
    <?php
    } else {
        echo "No items found.";
    }

    // Close connection
    mysqli_close($connect);
    ?>

    <!-- Empty Cart Table -->
    <h2>Your Cart</h2>
    <table border="1" id="cartTable">
        <tr>
            <th>Item Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </table>

    <script>
        function addToCart(advertisementID, productName, price, imagePath) {
            // Get the cart table
            var cartTable = document.getElementById("cartTable");
            var newRow = cartTable.insertRow(); // Insert a new row in the table

            // Insert new cells for image, name, price, and remove button
            var imgCell = newRow.insertCell(0);
            var nameCell = newRow.insertCell(1);
            var priceCell = newRow.insertCell(2);
            var actionCell = newRow.insertCell(3);

            // Set cell values
            imgCell.innerHTML = `<img src="${imagePath}" width="100" height="100">`;
            nameCell.innerHTML = productName;
            priceCell.innerHTML = "$" + price;
            actionCell.innerHTML = `<button class="remove-btn" onclick="removeFromCart(this)">Remove</button>`; // Button to remove item from cart
        }

        function removeFromCart(button) {
            // Remove the row from the table
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

</body>
</html>
