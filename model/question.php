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
    }
?>