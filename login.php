<?php
	// Pull username from $_COOKIE, if it exists
	$username = empty($_COOKIE['username']) ? '' : $_COOKIE['username'];
    

	if($username){
        header("Location: quote.php");
        exit;
    }
    
    $action = empty($_POST['action']) ? '' : $_POST['action'];
    if($action=='do_logout'){
		// Else, the form wasn't submitted, so present the login
        setcookie('username', '', 1);
        require "loginpage.php";
	}
	if ($action == 'do_login') {
		// If the action is "do_login", then the form was submitted
		handle_login();
	} 
    
    function handle_login() {
		$username = empty($_POST['user']) ? '' : $_POST['user'];
		$password = empty($_POST['pass']) ? '' : $_POST['pass'];
	  
		if ($username == "test" && $password == "pass") {
			setcookie('username', $username);
			header("Location: quote.php");
			exit;
		} 
        else if($username != 'test' && $password !='pass'){
            $error = "Error: Incorrect username and password";
            require "loginpage.php";
        }
        else if($username != 'test'){
            $error = "Error: Incorrect username";
            require "loginpage.php";
        }
        else if($password != 'pass'){
            $error = "Error: Incorrect password";
            require "loginpage.php";
        }
        else {
			$error = 'Error: Incorrect username or password';
			require "loginpage.php";
		}		
	}
?>