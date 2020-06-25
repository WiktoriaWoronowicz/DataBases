<?php

$inside = true;

foreach($_POST as $check => $val) {
	if (empty($_POST[$check])) {
		$inside = false;
		break;
	}
}	

if ($inside) {
	$rok_wydania = $_POST['rok_wydania'];
	$sygnatura = $_POST['sygnatura'];
	
	$link = new mysqli("localhost", "root", "", "biblioteka");
	if (!$link) die("Nie udało się połączyć.");
	$q = "INSERT INTO egzemplarz (rok_wydania,sygnatura) VALUES ('$rok_wydania', '$sygnatura')";
	$result = mysqli_query($link, $q) or die($link->error);
}
$link->close();
header('Location: egzemplarz.php');
?>