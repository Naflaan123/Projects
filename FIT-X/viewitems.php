<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "fit_x");

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'         => $_GET["id"],
                'item_name'       => $_POST["hidden_name"],
                'item_price'      => $_POST["hidden_price"],
                'item_quantity'   => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'         => $_GET["id"],
            'item_name'       => $_POST["hidden_name"],
            'item_price'      => $_POST["hidden_price"],
            'item_quantity'   => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="FoodCart.php"</script>';
            }
        }
    }
    elseif($_GET["action"] == "remove")
    {
        $item_id = $_GET["id"];
        $query = "DELETE FROM tblitems WHERE advertisementID = '$item_id'";
        if(mysqli_query($connect, $query))
        {
            echo '<script>alert("Item Removed from Database")</script>';
            echo '<script>window.location="viewitems.php"</script>';
        }
        else
        {
            echo '<script>alert("Error removing item")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>All Items</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            /* Ensure consistent sizing for images in product containers */
            .col-md-4 img {
                width: 100%; 
                height: 250px; 
                object-fit: cover; 
                border-radius: 5px; 
            }

            /* Page background */
            body {
                background: #f2f2f2; 
                background: linear-gradient(135deg, #B0E0E6 25%, #B0E0E6 100%); 
            }

            /* Container background */
            .container {
                background-color: #fff; 
                border-radius: 8px; 
                padding: 20px; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            }
        </style>
    </head>
    <body>
        <br />
        <div class="container">
            <br />
            <br />
            <br />
            <h1 align="center">Workout Programs</h1><br />
            <br /><br />
            <?php
                $query = "SELECT * FROM tblitems ORDER BY advertisementID ASC";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
            ?>
            <div class="col-md-4">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                    <img src="<?php echo $row["imagePath"]?>" class="img-responsive" /><br />
                    <h4 class="text-info"><?php echo $row["productName"]?></h4>
                    <h4 class="text-danger">RS <?php echo $row["item_price"]?></h4>
                    <input type="text" name="quantity" value="1" class="form-control" />
                    <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]?>" />
                    <input type="hidden" name="hidden_price" value="<?php echo $row["item_price"]?>" />
                    <a href="viewitems.php?action=remove&id=<?php echo $row["advertisementID"]; ?>" class="btn btn-danger" style="margin-top:5px;">Remove</a>
                </div>
            </div>
            <?php
                    }
                }
            ?>
            <div style="clear:both"></div>
            <br />
        </div>
        <br />
    </body>
</html>
