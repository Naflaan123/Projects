<?php
// Database connection
$connect = mysqli_connect("localhost", "root", "", "fit_x");

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start a session to manage user-specific cart
session_start();

// Check if the form was submitted and 'item_id' was passed
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    
    // You can use session to track the user ID, for now, we'll set a static user ID
    $user_id = 1; // Static user ID, replace this with session user_id when available

    // Check if the item is already in the cart for this user
    $check_cart_query = "SELECT * FROM cart WHERE item_id = '$item_id' AND user_id = '$user_id'";
    $check_result = mysqli_query($connect, $check_cart_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        // If item exists in the cart, update the quantity
        $update_cart_query = "UPDATE cart SET quantity = quantity + 1 WHERE item_id = '$item_id' AND user_id = '$user_id'";
        if (mysqli_query($connect, $update_cart_query)) {
            echo "Item quantity updated in cart!";
        } else {
            echo "Error updating cart: " . mysqli_error($connect);
        }
    } else {
        // If item does not exist, insert a new row into the cart
        $insert_cart_query = "INSERT INTO cart (item_id, user_id, quantity) VALUES ('$item_id', '$user_id', 1)";
        if (mysqli_query($connect, $insert_cart_query)) {
            echo "Item added to cart!";
        } else {
            echo "Error adding to cart: " . mysqli_error($connect);
        }
    }

    // Redirect back to clientcart.php after adding
    header("Location: clientcart.php");
    exit();
} else {
    echo "Invalid request.";
}

// Close connection
mysqli_close($connect);
?>
