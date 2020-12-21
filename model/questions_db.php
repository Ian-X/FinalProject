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
            $question = new question($row['id'], $row['owneremail'], $row['ownerid'], $row['createddate'], $row['title'], $row['body'], $row['skills'], $row['score']);
            $questions[] = $question;
        }
        return $questions;
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

    function delete_question ($question){
        $db = Database::getDB();
        $query = 'DELETE FROM questions WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $question.getID());
        $statement->execute();
        $statement->closeCursor();
    }
    function edit_question ($question, $title, $body, $skills){
        $db = Database::getDB();
        $query = 'UPDATE questions 
                    SET title = :title, body = :body, skills = :skills 
                    WHERE id = :id ';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':skills', $skills);
        $statement->bindValue(':id', $question.getID());
        $statement->execute();
        $statement->closeCursor();
    }
}
