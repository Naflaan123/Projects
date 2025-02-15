<?php session_start();
		$productname = $_POST["txtTitle"];
		$description = $_POST["txtDescription"];
		$contactNumber = $_POST["txtContactNumber"];
		$category = $_POST["lstCategory"];
		
		if (!file_exists($_FILES['imageFile']['tmp_name']) ||
		   !is_uploaded_file($_FILES['imageFile']['tmp_name']))
			{
				$image = $_SESSION["imagePath"];
			}
			else
			{
				$image = "uploads/".basename($_FILES["imageFile"]["name"]);
				move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
			}
		
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
		
		$sql = "UPDATE `tblitems` SET `productName` = '".$productname."', `item_price` = '".$description."', `publish` = '".$status."', `imagePath` = '".$image."', `contactNumber` = '".$contactNumber."', `category` = '".$category."' WHERE `tblitems`.`advertisementID` = ".$_SESSION["id"].";";
		
		if (mysqli_query($con, $sql))
		{
				header('Location:viewitems.php');
		}
		
?>