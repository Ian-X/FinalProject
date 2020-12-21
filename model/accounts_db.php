<?php
class AccountDB{
    static function validate_login($email, $password){
        $db = Database::getDB();
        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $userDB = $statement->fetch();
        $statement->closeCursor();

        if(count($userDB) > 0){
            $user = new Account($userDB['email'], $userDB['fname'], $userDB['lname'], $userDB['birthday'], $userDB['password']);
            return $user;
        }else{
            return false;
        }
    }
    static function create_user($email, $fname, $lname, $bday, $password){
        $db = Database::getDB();
        $query = 'INSERT INTO accounts 
				(email, fname, lname, birthday, password)
				VALUES
				(:email, :fname, :lname, :birthday, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':birthday', $bday);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
        $user = new Account($email, $fname, $lname, $bday, $password);
    }
}
?>
