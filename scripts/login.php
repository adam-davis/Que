<?php

	require_once('../models/user.php');
	
	
	$user = User::getUser($_POST['username']);
	if(sha1($_POST['password']) == $user->password())
	{
		session_start();
		$_SESSION['que-user'] = $user->id();

		header('location: ../index.php');
		
	
	}
	
	else
	{
		//Invalid Login
		
	}
	
	
	
?>