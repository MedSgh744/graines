<?php
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$code = $_POST['code'];
	$format = $_POST['format'];
	
	$conn = new mysqli('localhost','root','','books');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into invoice(name, quantity, code, format) values(?, ?, ?, ?)");
		$stmt->bind_param("siis", $name, $quantity, $code, $format);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your order has been successefuly proceded!";
		$stmt->close();
		$conn->close();
	}
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>