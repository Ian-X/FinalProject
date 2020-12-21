<?php
    class Account{
        private $id;
        private $email;
        private $fname;
        private $lname;
        private $birthday;
        private $password;

        public function __construct($id, $email, $fname, $lname, $birthday, $password){
            $this->id = $id;
            $this->email = $email;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->birthday = $birthday;
            $this->password = $password;
        }
        public function getID(){
            return $this->id;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getFirstName(){
            return $this->fname;
        }
        public function getLastName(){
            return $this->lname;
        }
        public function getBirthday(){
            return $this->birthday;
        }
        public function getPassword(){
            return $this->password;
        }
    }
?>