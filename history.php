<?php



	session_start();
	if(isset($_SESSION['que-user']))
		require_once('templates/loggedin.php');
	else
		require_once('templates/base.php');

	require_once('models/question.php');

	
	$user = $_SESSION['que-user'];
	
	$questionsForUser = Question::getQuestionsForUser($user);
	


?>	


<?php startblock('head') ?>

<?php endblock()?>


<?php startblock('mainContent')?>

<h2>Your Questions</h2>

<?php
foreach($questionsForUser as $question)
{

	print $question->question()."<br/>\nAnswer: ";
	if ($question->answer() != "")
		print $question->answer()."<br/><br/>";
	else
		print "Not yet answered!<br/><br/>";
		


}

?>
<?php endblock()?>