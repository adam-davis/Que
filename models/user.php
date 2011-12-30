<?php
require_once('../config/config.php');

class User
{
	private $_id;
	public function id()		{return $this->_id;}
	private $_username;
	public function username()	{return $this->_username;}
	private $_password;
	public function password()	{return $this->_password;}
	private $_email;
	public function email()		{return $this->_email;}
	



	public function __construct($id, $username, $password, $email)
	{
		$this->_id = $id;
		$this->_username = $username;
		$this->_password = $password;
		$this->_email = $email;

	}
	
	static public function getUserById($id)
	{
		$db = getDbConn();
		try
		{
			$query = "SELECT * FROM Users WHERE id = $id";
			$user = $db->query($query);
			$user = $user->fetch();
			
		}
		catch(Exception $e)
		{
			return 0;
		}
		return new User($user['id'], $user['username'], $user['password'], $user['email']);
	
	}
	static public function getUser($username)
	{
		$db = getDbConn();
		try
		{
			$query = "SELECT * FROM Users WHERE username = '$username'";
			$user = $db->query($query);
			$user = $user->fetch();
			
		}
		catch(Exception $e)
		{
			return 0;
		}
		return new User($user['id'], $user['username'], $user['password'], $user['email']);
	
	}
	
	static public function checkUserExists($username)
	{
		$db = getDbConn();
		$query = sprintf("SELECT COUNT(*) FROM Users WHERE username = '%s'", $username);
		$result = $db->query($query);
		$result = $result->fetchColumn(0);
		return $result;
	
	}

	public function delete()
	{
		
		$db = getDbConn();
		$db->exec("DELETE FROM Users WHERE username = $this->_username");
	}
	
	public function update()
	{
		$db = getDbConn();
		$db->exec(sprintf("UPDATE Users SET username = '%s', password = '%s', email = '%s' WHERE username = '%s'", $this->_username, $this->_password, $this->_email, $this->_username));
	}
	
	
	public function save()
	{
		$db = getDbConn();
		$query  = sprintf("INSERT INTO Users (username, password, email) VALUES ('%s', '%s', '%s')", $this->_username, $this->_password, $this->_email);
		$db->exec($query);
	}


}