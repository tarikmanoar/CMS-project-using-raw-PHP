<?php 


	$dbconn = mysqli_connect('localhost','root','','php_hunterblog');

	if (!$dbconn) {
		echo 'Connection Problem..........';
	}