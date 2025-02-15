<?php
session_start();

// Initialize the cart session variable as an array if it's not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_name'])) {
    $item = [
        'name' => $_POST['item_name'],
        'desc' => $_POST['item_desc'],
        'image' => $_POST['item_image']
    ];
    array_push($_SESSION['cart'], $item);
}
?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">  
</head>
<body>
    <section class="sub-header">
        <nav>
            <a href="index.html"><img src="fit Photos/" alt=""></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">HOME</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="programs.php">PROGRAMS</a></li>
					<li><a href="ad.php">DETAILS</a></li>
					<li><a href="chat.php">CART</a></li>
                </ul>
            </div>
        </nav>
        <h1>Your Cart</h1>
    </section>
    
    <section class="cart-content">
        <h2>Items in Your Cart</h2>
        <ul>
            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    if (is_array($item)) {
                        echo "<li>";
                        echo "<img src='".htmlspecialchars($item['image'])."' alt='".htmlspecialchars($item['name'])."' style='width:100px; height:auto;'>";
                        echo "<h3>".htmlspecialchars($item['name'])."</h3>";
                        echo "<p>".htmlspecialchars($item['desc'])."</p>";
                        echo "</li>";
                    }
                }
            } else {
                echo "<li>Your cart is empty</li>";
            }
            ?>
        </ul>
    </section>
    
    <section class="footer">
        <h4>About Us</h4>
        <p>At Fit-X, we cater to diverse fitness journeys with personalized workout plans for all levels. Our platform ensures effective and enjoyable fitness experiences, <br> tailored to support your unique health goals. Trust Fit-X for expertly crafted programs that deliver results and keep you motivated.</p>
        <span class="col">
            <a href="index.html"></a><img src="fit Photos/instagramlogo.png.png" alt="" width="42" height="40" class="img-thumbnail"/> 
            <a href="index.html"></a> <img src="fit Photos/twitter.png.png" alt="" width="42" height="40" class="img-thumbnail"/>
        </span>
        <span class="col">
            <a href="index.html"></a> <img src="fit Photos/facebooklogo.png.png" alt="" width="50" height="44" class="img-thumbnail"/>
        </span>
        <span class="col">
            <a href="index.html"></a><img src="fit Photos/youtubelogo.png.png" alt="" width="60" height="40" class="img-thumbnail"/>
        </span>
        <br> 
        <div class="social">
            <p>Get to know more about us</p>
        </div>
        <p>&nbsp;</p>
    </section>
</body>
</html>
