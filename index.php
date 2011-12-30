<?php




	session_start();
	if(isset($_SESSION['que-user']))
	require_once('templates/loggedin.php');
	else
	require_once('templates/base.php');



	
?>


<?php startblock('head') ?>

<title>¿Que? - Ask some questions</title>
<?php endblock() ?>

<?php startblock('mainContent') ?>
<?php if(isset($_SESSION['que-user']))
		print "Hey, welcome to que. As you can see things are very much in progress here, but the basic jist of things is that you ask a question, a random user responds to it, you get an answer. Wonderul, Right?";
	   else
	   {
			if(isset($_SESSION['newUser']))
			{
				print "User Created, Please Login!<br/><br/>";
				session_destroy();
			}
				
		print '<form method="POST" action="scripts/login.php">
		<label for="username">Username</label><input id="username" name="username" type="text"/><br/>
		<label for="password">Password</label><input id="password" name="password" type="password"/><br/>
		<input type="submit" value="Login"/> or <a href="register.php">Register</a>
		</form>
</div>';
}?>
<?php endblock()?>

