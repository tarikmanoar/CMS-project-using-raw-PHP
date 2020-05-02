<?php 


	$dbconn = mysqli_connect('localhost','root','','php_hunter_blog');

	if (!$dbconn) {
		echo 'Connection Problem..........';
	}
