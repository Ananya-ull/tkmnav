
<?php
session_start();
include('../db/connectionI.php');

if (isset($_POST['login']))
{	
$username=$_POST['UserName']; 
$password=$_POST['Password']; 

	

		
		if($username=="admin@gmail.com" && $password=="admin")
		{
			$_SESSION['type']='admin';
			$_SESSION['name']='Administrator';
			header("location:../dashboard/dashboard.php");
		}
		else{
			
			header("location:login.php?a=1");
			
		}	
	

	
}
else{

	header("location:login.php?a=1");
}
?>
 
 




