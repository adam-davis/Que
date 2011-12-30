<?php

session_start();
	require_once('scripts/general.php');
if(checkLoggedIn())
	require_once('templates/loggedin.php');
else
	require_once('templates/base.php');



?>

<?php startblock('head') ?>

<title>Ask a Question</title>


<?php endblock('head') ?>


<?php startblock('mainContent') ?>
<form name="questionForm" method="POST" action="scripts/ask.php">
	<label for="question" class="siteLabel">What would you like to know?</label>
	<textarea id="questionTextBpx" name="question" rows="20" cols="60" name="question"></textarea><br/>
	<input type="submit" value="Ask away"/>
</form>
<?php endblock() ?>


