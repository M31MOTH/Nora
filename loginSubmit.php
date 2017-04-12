<?php
	require 'helpers.php';
	session_start();

	if(!$_POST['username']) {
		redirect('index.html');
	}

	$_SESSION['user_id'] = $_POST['username'];
	redirect('taytay.php');
?>
