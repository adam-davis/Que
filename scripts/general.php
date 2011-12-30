<?php

function checkLoggedIn()
{
	session_start();
	if(isset($_SESSION['que-user']))
		return true;
	else
		return false;
}
?>