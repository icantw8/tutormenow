<?php
	
	$con = mysqli_connect('localhost', 'root', '', 'tmn');
	
	$username = $con->real_escape_string($_POST['username']);
	$password = $con->real_escape_string($_POST['password']);
	$password2 = $con->real_escape_string($_POST['password2']);
	$firstname = $con->real_escape_string($_POST['firstname']);	
	$lastname = $con->real_escape_string($_POST['lastname']);
	
	//Check if username already exists.
	$sql_u = "SELECT * FROM student WHERE Username = '$username'";
	$res_u = mysqli_query($con, $sql_u);
	if (mysqli_num_rows($res_u)>0){
		echo "Username already taken";
	}else{
	//Check if passwords match.
		if ($password == $password2){
		$hash = password_hash($password, PASSWORD_BCRYPT);
		$sql = "INSERT INTO student (Username, Password, FirstName, LastName) VALUES ('$username','$hash','$firstname','$lastname')";
		mysqli_query($con,$sql);
		echo "data inserted";
		}else{
			echo "Passwords do not match";
		}
	}


?>