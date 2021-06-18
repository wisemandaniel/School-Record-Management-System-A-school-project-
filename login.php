<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysqli_connect('localhost','root','');
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysqli_select_db($link, 'srms2');
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	
	//Sanitize the POST values
	$login = ($_POST['username']);
	$password = ($_POST['password']);
	
	$errmsg_arr[] = "error";
	//If there are input validations, redirect back to the login form
	
	
	//Create query
	$qry="SELECT * FROM admin WHERE username='$login' AND password='$password'";
	$result=mysqli_query($link, $qry);
	
	

	//Check whether the query was successful or not
	if($result) {
		if (mysqli_num_rows($result) == 0) {
			echo "<script>alert('Username and password combination do not match')</script>";	
		}
		else if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
			$_SESSION['SESS_LAST_NAME'] = $member['position'];
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: main/index.php");
			exit();
		} else {
			//Login failed
			header("location: index.php");
			exit();
		}
	} else {
		die("Query failed");
	}
?>