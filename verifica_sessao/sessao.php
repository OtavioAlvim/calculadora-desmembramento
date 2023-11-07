<?php
session_start();
if(!$_SESSION['nome']) {
	$_SESSION['sem_login'] = true;
	header('Location: ./index.php');
	exit();
}