<?php

$inside = true;

foreach($_POST as $check => $val) {
	if (empty($_POST[$check])) {
		$inside = false;
		break;
	}
}	

if ($inside) {
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$indeks = $_POST['indeks'];
	
	$link = new mysqli("localhost", "root", "", "biblioteka");
	if (!$link) die("Nie udało się połączyć.");
	$q = "INSERT INTO studenci (imie,nazwisko,indeks) VALUES ('$imie', '$nazwisko','$indeks')";
	$result = mysqli_query($link, $q) or die($link->error);
}
$link->close();
header('Location: uzytkownik.php');
?>