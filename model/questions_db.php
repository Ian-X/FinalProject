<?php
function get_users_questions($userId){
	global $db;
	$query = 'SELECT * FROM questions WHERE ownerid = :userId';
	$statement = $db->prepare($query);
	$statement->bindValue(':userId', $userId);
	$statement->execute();
	
	$questions = $statement->fetchAll();
	$statement->closeCursor();
	
	return $questions;
}
function create_question ($title, $body, $skills, $ownerid){
	global $db;
	$query = 'INSERT INTO questions 
				(title, body, skills, ownerid)
				VALUES
				(:title, :body, :skills, :ownerid)';
	$statement = $db->prepare($query);
	$statement->bindValue(':title', $title);
	$statement->bindValue(':body', $body);
	$statement->bindValue(':skills', $skills);
	$statement->bindValue(':ownerid', $ownerid);
	$statement->execute();
    $statement->closeCursor();
}

function delete_question ($title, $body, $skills, $ownerid){
    global $db;
    $query = 'DELETE FROM questions WHERE title = :title AND body = :body AND skills = :skills AND ownerid = :ownerid';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    $statement->closeCursor();
}