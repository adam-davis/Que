<?php



	session_start();
	if(isset($_SESSION['que-user']))
		require_once('templates/loggedin.php');
	else
		require_once('templates/base.php');

	require_once('models/question.php');

	
	$user = $_SESSION['que-user'];
	
	$questionsForUser = Question::getQuestionsToBeAnswered($user);
	


?>	

<?php startblock('head')?>
<script type="text/javascript">
function answer(questionId)
{
	var answer = document.getElementById("answer"+questionId);


	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open("GET", "scripts/answer.php?id="+questionId+"&answer="+answer.value, true);
	xmlHttp.send();
	xmlHttp.onreadystatechange = function () 
	{

	if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
		alert(xmlHttp.responseText);
		var question = document.getElementById("question"+questionId);
		question.innerHTML = "Question has been Answered!";
	
	};
	}



}


</script>

<?php endblock()?>

<?php startblock('mainContent')?>
<h2>Answer a Few Questions Maybe?</h2>
<?php 

	foreach($questionsForUser as $question)
	{
		print "<div id=\"question".$question->id()."\">".$question->question();
		print "\n<br/>\n
				<textarea id=\"answer".$question->id()."\"></textarea>\n
				<br/>\n
				<button onclick=answer('".$question->id()."')>Answer!</button></div>\n
				<br/><br/>";
	
	
	}
?>
<?php endblock()?>