<?php


require_once("../models/question.php");
$answer = $_GET['answer'];
$questionToAnswer = Question::getQuestionById($_GET['id']);
echo $questionToAnswer->answerQuestion($answer);




?>