<?php
session_start();

// Check if an action and ID are provided
if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])) {
    $item_id = $_GET["id"];
    
    // Check if the shopping cart session variable exists
    if (isset($_SESSION["shopping_cart"])) {
        // Loop through the shopping cart to find the item to remove
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $item_id) {
                unset($_SESSION["shopping_cart"][$keys]);
                // Reindex the array to avoid gaps in the array keys
                $_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
                break;
            }
        }
    }
    
    // Redirect to the page where the shopping cart is displayed
    header("Location: viewitems.php");
    exit();
} else {
    // If no action is set, or an invalid action is requested, redirect to the home page
    header("Location: viewitems.php");
    exit();
}
?>
