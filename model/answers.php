<?php
    class Answer{
        private $id;
        private $email;
        private $questionid;
        private $body;
        private $score;
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