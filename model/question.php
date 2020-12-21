<?php
    class Question{
        private $id;
        private $email;
        private $ownerid;
        private $createddate;
        private $title;
        private $body;
        private $skills;
        private $score;

        public function __construct($id, $email, $ownerid, $createddate, $title, $body, $skills, $score){
            $this->id = $id;
            $this->email = $email;
            $this->ownerid = $ownerid;
            $this->createddate = $createddate;
            $this->title = $title;
            $this->body = $body;
            $this->skills = $skills;
            $this->score = $score;
        }
        public function getID() {
            return $this->id;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getOwnerID() {
            return $this->ownerid;
        }
        public function getDate() {
            return $this->createddate;
        }
        public function getTitle() {
            return $this->title;
        }
        public function getScore() {
            return $this->score;
        }
        public function getBody() {
            return $this->body;
        }
        public function getSkills() {
            return $this->skills;
        }
        public function newAnswer($body, $email) {
            $db = Database::getDB();
            $query = 'Insert INTO answers (body, questionid, email) VALUES (:body, :id, :email)';
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $this->id);
            $statement->bindValue(':body', $body);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $statement->closeCursor();
        }
        public function getAnswers() {
            $db = Database::getDB();
            $query = 'SELECT * FROM answers WHERE questionid=:id ORDER BY score DESC';
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $this->id);
            $statement->execute();
            $something = $statement->fetchAll();
            $statement->closeCursor();
            $answers = array();
            foreach($something as $row){
                $answer = new Answer($row['id'], $row['email'], $row['questionid'], $row['body'], $row['score']);
                $answers[] = $answer;
            }
            return $answers;
        }
    }
?>