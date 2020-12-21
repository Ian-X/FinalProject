<?php
class AccountDB{
    static function validate_login($email, $password){
        $db = Database::getDB();
        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();

        if($user != false || count($user) > 0){
            return new Account($user['id'], $user['email'], $user['fname'], $user['lname'], $user['birthday'], $user['password']);
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
