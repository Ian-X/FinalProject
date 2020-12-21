<?php
class QuestionDB{
    function get_questions(){
        $db = Database::getDB();
        $query = 'SELECT * FROM questions';
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $user.getID());
        $statement->execute();
        $statement->closeCursor();

        $questions = array();
        foreach($statement as $row){
            $question = new
        }
    }

    function create_question ($title, $body, $skills, $ownerid, $email){
        $db = Database::getDB();
        $query = 'INSERT INTO questions 
				(title, body, skills, ownerid, owneremail)
				VALUES
				(:title, :body, :skills, :ownerid, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':ownerid', $ownerid);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_question ($title, $body, $skills, $ownerid){
        $db = Database::getDB();
        $query = 'DELETE FROM questions WHERE title = :title AND body = :body AND skills = :skills AND ownerid = :ownerid';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':ownerid', $ownerid);
        $statement->execute();
        $statement->closeCursor();
    }
}
