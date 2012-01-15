<?php

	require_once('/home/n00bhippy/scope-resolution.org/public/que/config/config.php');


class Question
{



	private $_id;
	public function id() {return $this->_id;}
	private $_user;
	public function user() {return $this->_user;}
	private $_question;
	public function question()	{return $this->_question;}
	private $answered;
	public function answered()	{return $this->_answered;}
	private $_dateCreated;
	public function dateCreated() {return $this->_dateCreated;}
	private $_answer;
	public function answer()		{return $this->_answer;}
	private $_responder;
	public function responder()		{return $this->_responder;}


	static public function getQuestionsForUserJSON($user)
	{
		$db = getDbConn();
		$questions = array();
		$query = sprintf("SELECT * FROM Questions WHERE user = %d", $user);
		$results = $db->query($query);
		
		while($question = $results->fetch())
		{
		
			$questions[] = array("id" => $question['id'], "user" => $question['user'], "question" => $question['question'], "answer" => $question['answer'], "responder" => $question['responder'], "date_created" => $question['date_created'],  "answered" => $question['answered']);
		
		}
		
		return $questions;
	
	}
	public function __construct($id, $user, $question, $answer, $responder ="", $dateCreated="", $answered="")
	{
		$this->_id = $id;
		$this->_user = $user;
		$this->_question = $question;
		$this->_responder = $responder;
		$this->_answer = $answer;
		$this->_dateCreated = $dateCreated;
		$this->_answered = $answered;


	}

		static public function getQuestionsForUser($user)
	{
		$db = getDbConn();
		$questions = array();
		$query = sprintf("SELECT * FROM Questions WHERE user = %d", $user);
		$results = $db->query($query);
		
		while($question = $results->fetch())
		{
		
			$questions[] = new Question($question['id'], $question['user'], $question['question'], $question['answer'], $question['responder'], $question['date_created'],  $question['answered']);
		
		}
		
		return $questions;
	
	}
	static public function getQuestionsToBeAnswered($user)
	{
		$db = getDbConn();
		$questions = array();
		$query = sprintf("SELECT * FROM Questions WHERE responder = %d AND answered = FALSE", $user);
		$results = $db->query($query);
		
		while($question = $results->fetch())
		{
		
			$questions[] = new Question($question['id'], $question['user'], $question['question'], $question['$answer'], $question['date_created'],  $question['answered']);
		
		}
		
		return $questions;
	
	}
	static public function getQuestionById($id)
	{
		$db = getDbConn();
		$query = sprintf("SELECT * FROM Questions WHERE id = %d", $id);
		$question = $db->query($query)->fetch();
		
		return new Question($question['id'], $question['user'], $question['question'], $question['$answer'], $question['date_created'],  $question['answered']);
	
	
	}
	
	static public function getQuestionByText($question)
	{
		$db = getDbConn();
		$query = sprintf("SELECT * FROM Questions WHERE question ='%s'", $question);
		$result = $db->query($query)->fetch();

	
		
		return new Question($question['id'], $question['user'], $question['question'], $question['$answer'], $question['date_created'],  $question['answered']);
	
	}
	
	
	public function delete()
	{
	
		
	
	
	}
	
	public function update()
	{
	
	
	
	}
	
	public function answerQuestion($answer)
	{
		$query = sprintf("UPDATE Questions SET answered = TRUE, answer = '%s' WHERE id = %d", $answer, $this->id());
		$this->_dbConn->exec($query);
		return $query;
	}
	
	public function save()
	{
		$user = $this->_user;
		$responder = $this->assignResponder();
		$query = sprintf("INSERT INTO Questions (question, user, responder) VALUES ('%s', %d, %d)", $this->question(), $user, $responder);
		$this->_dbConn->exec($query);

		return $query;
	}
	
	private function assignResponder()
	{
		$query = sprintf("SELECT id from Users WHERE id != %d", $this->_user);
		$ids = $this->_dbConn->query($query);
		$result = $ids->fetchAll(PDO::FETCH_NUM);
		$user = $result[rand(0, count($result)-1)];
		return $user[0];
	
	}

}