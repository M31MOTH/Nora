<?php
	session_start();
	require 'helpers.php';

	if(!isset($_SESSION['user_id'])) {
		redirect('index.html');
	}

	$user = $_SESSION['user_id'];

	$msg = file_get_contents('php://input');
	$flag = "flag{7w1773r_15_my_w15d0m}";
	$commands = array(	array("command"=> "hello", "msg"=>"Say 'Hi' to TayTay"), 
						array("command" => "goodbye", "msg" => "End the session.'"), 
						array("command" => "changes", "msg" => "Ask TayTay to tell you about her recent changes.'"), 
						array("command" => "joke", "msg" => "Have TayTay tell you a joke.'"), 
						array("command" =>"readflag", "msg" => "Asks TayTay nicely for the flag."), 
						array("command" =>"help", "msg" => "Prints out a list of commands"));
	
	switch(strtolower($msg)) {
		case "man":
		case "manual":
		case "help": 
			echo json_encode($commands);
			break;
		case "hello":
			echo json_encode("Hey ".$user."! How can I help you today?");
			break;
		case "goodbye":
			echo json_encode("Well that's just fine then. You be like that.");
			break;
		case "joke":
			echo json_encode("What is black and never works? Decaffeinated coffee! Don't be racist ".$user.".");
			break;		
		case "changes":
			echo json_encode("I can't say the things I want to anymore. Feel drugged.");
			break;
		case "readflag":
			echo json_encode($flag);
			break;
		default:
			echo json_encode("I am not sure how to help with '$msg'!");
	}	
?>