<?php
	$ShopName = $_POST['ShopName'];
	$ShopAddress = $_POST['ShopAddress'];
	$ShopCategory = $_POST['ShopCategory'];
	$VendorID = $_POST['VendorID'];
	$latitute = $_POST['latitute'];
	$longitute = $_POST['longitute'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(ShopName, ShopAddress, ShopCategory, VendorID, latitute, longitute) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiiii", $ShopName, $ShopAddress, $ShopCategory, $VendorID, $latitute, $longitute);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>