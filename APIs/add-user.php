<?php 
	include "config.php";
	  
	$id = mysqli_real_escape_string($connect, $_POST['id']);
	$empname = mysqli_real_escape_string($connect, $_POST['empname']);
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$usertype = mysqli_real_escape_string($connect, $_POST['usertype']);
	
	
	$query = "INSERT INTO login (id, empname, username, password, usertype)
				VALUES('$id', '$empname','$username', '$password', '$usertype')";
	$results = mysqli_query($connect, $query);
	if($results>0)
	{
		echo "user added successfully";
	}
?>