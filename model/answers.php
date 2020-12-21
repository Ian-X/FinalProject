<?php
    class Answer{
        private $id;
        private $email;
        private $questionid;
        private $body;
        private $score;
        public function __constructor($id, $email, $questionid, $body, $score){
            $this->id = $id;
            $this->email = $email;
            $this->questionid = $questionid;
            $this->body = $body;
            $this->score = $score;
        }
        public function updoot(){
            $db = Database::getDB();
            $query = 'UPDATE answers SET score = :score WHERE id = :id';
            $statement = $db->prepare($query);
            $statement->bindValue(':score', $this->score+1);
            $statement->bindValue(':id', $this->id);
            $statement->execute();
            $statement->closeCursor();
        }
        public function downvote(){
            $db = Database::getDB();
            $query = 'UPDATE answers SET score = :score WHERE id = :id';
            $statement = $db->prepare($query);
            $statement->bindValue(':score', $this->score-1);
            $statement->bindValue(':id', $this->id);
            $statement->execute();
            $statement->closeCursor();
        }
    }
?>