<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$type = $_POST['type'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','zhibek');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into zhibek(name, email, phoneNumber, type, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $name, $email, $phoneNumber, $type, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "message successfully...";
		$stmt->close();
		$conn->close();
	}
?>