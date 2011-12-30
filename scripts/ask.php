<?php
	require_once('../models/question.php');

	require_once('general.php');
	if(!checkLoggedIn())
		header('location: index.php');
		

	$newQuestion = new Question(0, $_SESSION['que-user'], $_POST['question']);
	$newQuestion->save();
	
	header('location: ../index.php');



?>