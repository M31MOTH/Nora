<?php
	session_start();
	require 'helpers.php';
	if(!isset($_SESSION['user_id'])) {
	redirect('index.html');
	}
	$msg = file_get_contents('php://input');
	$flag = "flag{7w1773r_15_my_w15d0m}";
	$commands = array(	array("command"=> "greetings", "msg"=>"Tells the bot 'Hi'"), 
						array("command" => "farewell", "msg" => "Tells the bot 'goodbye'"), 
						array("command" =>"readflag", "msg" => "Asks the bot for the flag"), 
						array("command" =>"help", "msg" => "Prints out a list of commands"));
	switch(strtolower($msg)) {
		case "help": 
			echo json_encode($commands);
			break;
		case "greetings":
			echo json_encode("Hey There! How can I help you today?");
			break;
		case "farewell":
			echo json_encode("Farewell! Wishing you the best!");
			break;
		case "readflag":
			echo json_encode($flag);
			break;
		default:
			echo json_encode("I am not sure how to help with '$msg'!");
	}	
?>