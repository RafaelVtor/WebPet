<?php
	echo "Você saiu!";
	session_start();
	session_destroy();
	header("Location:index.php");
 ?>