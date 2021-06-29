<?php
	// Encerrar a sessão
	session_start();
	session_destroy();
	unset($_SESSION);

	header('LOCATION: index.php');