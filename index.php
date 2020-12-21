<?php
require('model/database.php');
require('model/accounts_db.php');
require('model/questions_db.php');
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

switch ($action) {
    case 'show_login': {
        include('views/login.php');
        break;
    }
	case 'validate_login':{
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		if($email == NULL || $password == NULL){
			$error = 'Email and Password not included';
			include('errors/error.php');
		}else{
			$userId = validate_login($email, $password);
			if($userId == false){
				header('Location: .?action=display_registration');
			}
			else{
				header("Location: .?action=display_questions&userId=$userId");
			}
		}
		break;
	}
	case 'display_registration':{
		include('views/registration.php');
		break;
	}
	case 'display_questions':{
		$userId = filter_input(INPUT_GET, 'userId');
		if($userId == NULL || $userId < 0){
			header('Location: .?action=show_login');
		}else{
            $user = get_user($userId);
            $fullname = $user[fname].' '.$user[lname];
			$questions = get_users_questions($userId);
			include('views/display_questions.php');
		}
		break;
	}
	case 'display_question_form': {
		$userId = filter_input(INPUT_GET, 'userId');
        $title = filter_input(INPUT_GET, 'title');
        $body = filter_input(INPUT_GET, 'body');
        $skills = filter_input(INPUT_GET, 'skills');
		if($userId == NULL || $userId < 0){
			header('Location: .?action=show_login');
		}else{
			include('views/questions_form.php');
		}
		break;
	}
    case 'register_user':{
        $fname = filter_input(INPUT_GET, 'fname');
        $lname = filter_input(INPUT_GET, 'lname');
        $bday = filter_input(INPUT_GET, 'bday');
        $email = filter_input(INPUT_GET, 'email');
        $password = filter_input(INPUT_GET, 'pass');
        if($email == NULL || $password == NULL || $fname == NULL || $lname == NULL || $bday == NULL){
            $error = 'All fields must be filled';
            include('errors/error.php');
        }else{
            if(!strpos($email,"@")){
                $error = 'Email requires @';
                include('errors/error.php');
            }
            else if(strlen($password) < 8){
                $error = 'Password too short. Must be at least 8 character.';
                include('errors/error.php');
            }
            else{
                create_user($email, $fname, $lname, $bday, $password);
                header('Location: .?action=show_login');
                echo $password;
            }
        }
        break;
    }
    case 'edit_question':{
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        delete_question($title, $body, $skills, $userId);
        header("Location: .?action=display_question_form&userId=$userId&title=$title&body=$body&skills=$skills");
        break;
    }
	case 'submit_question': {
		$userId = filter_input(INPUT_POST, 'userId');
		$title = filter_input(INPUT_POST, 'title');
		$body = filter_input(INPUT_POST, 'body');
		$skills = filter_input(INPUT_POST, 'skills');
		if($userId == NULL || $title == NULL || $body == NULL || $skills == NULL){
			$error = 'All fields are required';
			include('errors/error.php');
		}else{
		    $user = get_user($userId);
		    $email = $user['email'];
			create_question($title, $body, $skills, $userId, $email);
			header("Location: .?action=display_questions&userId=$userId");
		}
		break;
	}
    case 'delete_question':{
        $userId = filter_input(INPUT_POST, 'userId');
        $title = filter_input(INPUT_POST, 'title');
        $body = filter_input(INPUT_POST, 'body');
        $skills = filter_input(INPUT_POST, 'skills');
        delete_question($title, $body, $skills, $userId);
        header("Location: .?action=display_questions&userId=$userId&title=$title&body=$body&skills=$skills");

        break;
    }

    default: {
        $error = 'Unknown Action';
        include('errors/error.php');
    }
}
?>

