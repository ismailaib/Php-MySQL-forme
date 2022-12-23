<?php
	$fullname = $_POST['fullname'];
	$age = $_POST['age'];
	$adress = $_POST['adress'];
	$phone = $_POST['phone'];
	$level = $_POST['level'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fullname, age, adress, phone, level) 
		values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $fullname, $age, $adress, $phone, $level);
		$stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
