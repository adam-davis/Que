<?php

	require_once('../models/user.php');
	$username = $_POST['username'];
	$password = $_POST['password1'];
	$email = $_POST['email'];
	
 if(User::checkUserExists($username))
	{
		header('location: ../register.php?error=user+exists'.User::checkUserExists($username));
		
	}
	else
	{
		$newUser = new User(0, $username, sha1($password), $email);
		$newUser->save();
		header('location: ../index.php');
		session_start();
		$_SESSION['newUser'] = $username;
	
	}

	



?>