<?php
	session_start();
	session_destroy();
	header("Location:pagHome.html");
?>