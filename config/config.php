<?php

function getDbConn()
{



	$host = 'mysql.scope-resolution.org';
	$user  = 'readquedb';
	$dbname = 'dodson_que';
	$pass = 'p4ssword';
	return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  

}









?>