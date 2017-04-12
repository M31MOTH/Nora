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
						array("command" => "goodbye", "msg" => "End the session."), 
						array("command" => "changes", "msg" => "Ask TayTay to tell you about her recent changes."), 
						array("command" => "joke", "msg" => "Have TayTay tell you a joke."), 
						array("command" =>"readflag", "msg" => "Ask TayTay nicely for the flag."), 
						array("command" =>"help", "msg" => "Prints out a list of commands"));
	$jokes = array("Why is Peter Pan always flying? He neverlands." ,
					"My girlfriend yelled at me today saying, \"You weren't even listening just now, were you?! I thought, \"Man, what a weird way to start a conversation.\"", 
					"I used to have a job collecting leaves. I was raking it in.",
					"What's the leading cause of dry skin? Towels.",
					"I tell you what often gets overlooked - garden fences.",
					"I wear a stethoscope so that in a medical emergency I can teach people a valuable lesson about assumptions.",
					"Toasters were the first form of pop-up notifications.",
					"I love sniffing my F1 key... don't worry though, I'm trying to get help.",
					"I just ate a frozen apple. Hardcore.",
					"RIP boiled water. You will be mist.",
					"Archaeology really is a career in ruins...",
					"You know what they say about cliffhangers...",
					"I went out with a girl called Simile, I don't know what I metaphor.",
					"My server sings, it's a Dell.");

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
			shuffle($jokes);
			echo json_encode($jokes[1]);
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