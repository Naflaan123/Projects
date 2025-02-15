<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/formStyle.css">
</head>

<body>
	<?php
	$_SESSION["id"] = $_GET["id"];
		$con = mysqli_connect("localhost","root","","ppaproject");
		if (!$con)
		{
			die("Sorry!!! We are facing technical issue..");
		}
	
		$sql = "SELECT * FROM `tblitems` WHERE `advertisementID` = ".$_GET["id"].";";
	
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
	
	?>

    <section>
        <article>
            <form action="editHandler.php" method="post" enctype="multipart/form-data">
                <div>
                    <h1>
                        Add Items
                    </h1>
                </div>
                
                <div>
                    <label for="ProductName">Name <span style="color: red; font-size: 20px;">*</span> </label>
                    <input type="text" id="txtTitle" name="txtTitle" placeholder="Enter Food Name" value="<?php echo $row["productName"]; ?>" required>
                </div>
                    
                <div>
                    <label for="Description">Price <span style="color: red; font-size: 20px;">*</span></label>
                    <input type="text" id="txtDescription" name="txtDescription" placeholder="Price of Item" value="<?php echo $row["item_price"]; ?>">
                </div>
    
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="imageFile" required>
                </div>
    
                <div>
                    <label for="category">Category     </label>
                    <select name="lstCategory">
                        <option value="Vegitable" <?php if($row["category"]=="Vegitable"){echo "selected";} ?>>Vegitable</option>
						<option value="Meat" <?php if($row["category"]=="Meat"){echo "selected";} ?>>Meat</option>
                    </select>
                </div>
    
                <div>
                    <label for="contactNumber">Contact Number <span style="color: red; font-size: 20px;">*</span></label>
                    <input type="text" name="txtContactNumber" placeholder="Your Contact Number" value="<?php echo $row["contactNumber"]; ?>">
                </div>
    
                <label for="chkPublish" class="checkbox">Publish the Advertisement
                    <input type="checkbox" name="chkPublish" <?php if($row["publish"]==1){echo "checked";} ?>>
                </label>
    
                <div class="addpost">
                    <button name="btnSubmit">Edit Post</button>
                </div>
				
				<div class="addpost">
                    <button name="back"><a href="Account.php">Account</a></button>
                </div>
				
				<?php
					if(isset($_POST["btnSubmit"]))
					{
						$productname = $_POST["txtTitle"];
						$description = $_POST["txtDescription"];
						$contactNumber = $_POST["txtContactNumber"];
						$category = $_POST["lstCategory"];
		
						$image = "uploads/".basename($_FILES["imageFile"]["name"]);
						move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
		
						if (isset($_POST["chkPublish"]))
						{
							$status = 1;
						}
						else
						{
							$status = 0;
						}
		
						$con = mysqli_connect("localhost","root","","ppaproject");
		
						if (!$con)
						{
							die("Sorry!!! We are facing technical issue..");
						}
		
						$sql = "INSERT INTO `tblitems` (`advertisementID`, `productName`, `item_price`, `publish`, `imagePath`, `contactNumber`, `category`) VALUES (NULL, '".$productname."', '".$description."', '".$status."', '".$image."', '".$contactNumber."', '".$category."');";
		
						if (mysqli_query($con, $sql) > 0)
						{
							echo "Advertisement uploaded successfully!";
						}
						else
						{
							echo "Oops!! Something went wrong, please select the file again!";
						}
					}
				?>
				
            </form>
        </article>
    </section>
    
</body>

</html>