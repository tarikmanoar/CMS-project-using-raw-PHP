<?php 


	$dbconn = mysqli_connect('localhost','root','','php_project');

	if (!$dbconn) {
		echo 'Connection Problem..........';
	}