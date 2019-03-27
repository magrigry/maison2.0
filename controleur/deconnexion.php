<?php
	session_start();
	setcookie('username', '', (time() + 1), '/', '137.74.197.153', false, true);
	setcookie('password', '', (time() + 1), '/', '137.74.197.153', false, true);
	session_destroy();
	header('Location: ../index.php');
?>