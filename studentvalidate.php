<?php
	
	
	$con = mysqli_connect('localhost', 'root', '', 'tmn');
	
	$username = $con->real_escape_string($_POST['username']);
	$password = $con->real_escape_string($_POST['password']);
	
	
	$sql = "SELECT ID, Password FROM student WHERE Username = '$username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
		if(password_verify($password, $row['Password'])){
			echo "You're in";
		}else{
			echo "Check input";
			
		}
	
	
		
		
?>
