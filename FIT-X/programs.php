<!doctype html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fit-X</title>
   <link href="style.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">  
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
		<h1>BEST SELLING</h1>
	</section>
	
	<!---------- featured programs----------->
	<div class="small">
		<div class="row row-2">
			<h2>All Items</h2>
			<select id="sortOptions" onchange="sortItems()">
				<option value="default">Default Sorting</option>
				<option value="price">Sort by Price</option>
				<option value="popularity">Sort by Popularity</option>
				<option value="rating">Sort by Rating</option>
				<option value="sale">Sort by Sale</option>
			</select>
		</div>
	</div>
	
	<div class="small" id="productContainer">
		<div class="row row-2">
			<div class="col-4" data-price="189" data-popularity="4" data-rating="5" data-sale="2">
				<a href="prog1.php"><img src="fit Photos/m1.webp" alt=""></a>
				<h4>Workouts</h4>
				<h4>$189.00</h4>
			</div>
			<div class="col-4" data-price="99" data-popularity="2" data-rating="3" data-sale="5">
				<a href=""><img src="fit Photos/m2.jpg" alt=""></a>
				<h4>Workouts</h4>
				<h4>$99.00</h4>
			</div>
			<div class="col-4" data-price="150" data-popularity="3" data-rating="4" data-sale="3">
				<a href=""><img src="fit Photos/m3.jpg" alt=""></a>
				<h4>Workouts</h4>
				<h4>$150.00</h4>
			</div>
			<div class="col-4" data-price="199" data-popularity="5" data-rating="5" data-sale="1">
				<a href=""><img src="fit Photos/m4.webp" alt=""></a>
				<h4>Workouts</h4>
				<h4>$199.00</h4>
			</div>
			<div class="col-4" data-price="199" data-popularity="5" data-rating="5" data-sale="1">
				<a href=""><img src="fit Photos/m5.webp" alt=""></a>
				<h4>Workouts</h4>
				<h4>$199.00</h4>
			</div>
			<div class="col-4" data-price="100" data-popularity="2" data-rating="3" data-sale="4">
				<a href=""><img src="fit Photos/m6.jpg" alt=""></a>
				<h4>Workouts</h4>
				<h4>$100.00</h4>
			</div>
			<div class="col-4" data-price="99" data-popularity="1" data-rating="2" data-sale="6">
				<a href=""><img src="fit Photos/m7.jpg" alt=""></a>
				<h4>Workouts</h4>
				<h4>$99.00</h4>
			</div>
			<div class="col-4" data-price="90" data-popularity="3" data-rating="4" data-sale="5">
				<a href=""><img src="fit Photos/m8.webp" alt=""></a>
				<h4>Workouts</h4>
				<h4>$90.00</h4>
			</div>
			<div class="col-4" data-price="100" data-popularity="4" data-rating="5" data-sale="3">
				<a href=""><img src="fit Photos/m9.webp" alt=""></a>
				<h4>Workouts</h4>
				<h4>$100.00</h4>
			</div>
		</div>
	</div>
	
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
	
	<script>
		function sortItems() {
			const container = document.getElementById('productContainer');
			const items = Array.from(container.getElementsByClassName('col-4'));
			const sortOption = document.getElementById('sortOptions').value;
	
			items.sort((a, b) => {
				let aValue, bValue;
				switch (sortOption) {
					case 'price':
						aValue = parseFloat(a.getAttribute('data-price'));
						bValue = parseFloat(b.getAttribute('data-price'));
						break;
					case 'popularity':
						aValue = parseFloat(a.getAttribute('data-popularity'));
						bValue = parseFloat(b.getAttribute('data-popularity'));
						break;
					case 'rating':
						aValue = parseFloat(a.getAttribute('data-rating'));
						bValue = parseFloat(b.getAttribute('data-rating'));
						break;
					case 'sale':
						aValue = parseFloat(a.getAttribute('data-sale'));
						bValue = parseFloat(b.getAttribute('data-sale'));
						break;
					default:
						return 0;
				}
				return aValue - bValue;
			});
	
			container.innerHTML = '';
			items.forEach(item => container.appendChild(item));
		}
	</script>
	
</body>
</html>
