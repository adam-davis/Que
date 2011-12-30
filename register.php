<?php


	require_once('templates/base.php');

?>

<?php startblock('head')?>

<?php endblock() ?>
<title>¿Que? - Ask some questions</title>


<?php startblock('mainContent') ?>
<h2>Signup for an account</h2>
<?php
	if(isset($_GET['error']))
		echo $_GET['error']."\n<br/><br/>";
		?>
<form name="register" method="POST" action="scripts/register.php">
<label class="siteLabel" for="username">Username</label><input id="username" class="" name="username" type="text" required/><Br/>
<label class="siteLabel" for="password1">Password</label><input id="password1" class="" name="password1" type="password" required/><Br/>
<label class="siteLabel" for="password2">Password(again)</label><input id="password2" class="" name="password2" type="password" required/><Br/>
<label class="siteLabel" for="email">E-mail</label><input id="email" class="" name="email" type="text" required/><Br/>
<input type="submit" value="Register!" /><Br/>


</form>
<?php endblock() ?>
