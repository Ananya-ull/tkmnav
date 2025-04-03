<?php

	include("connection.php");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	$sql = "INSERT INTO user(name, email, phone, password) VALUES ('$name','$email','$phone','$password')";
	
	if($result = mysqli_query($con, $sql))
	{
		echo "Success";
	}
	else{
		echo "failed";
	}

?>