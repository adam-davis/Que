<?php

	require_once('../models/user.php');

	$user = User::getUser($_POST['username']);
	if(sha1($_POST['password']) == $user->password())
	{
		print 'true';
	}
	
	else
	{
		print 'false';
		
	}
	

	
	
	
?>