<?php

include('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";

// echo $sql;	

if($res = mysqli_query($con, $sql))
{
	if(mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_assoc($res);
		echo json_encode($row);
	}
	else{
		echo "failed";
	}
}
else{
	echo "error";
}
 
?>