<?php
session_start();
if (!isset($_SESSION['zalogowano'])) {
	header('Location: login.php');
	exit();
}

$title = "YourLibrary.pl";
include 'widok.php';

echo $_SESSION['user'];
?>
