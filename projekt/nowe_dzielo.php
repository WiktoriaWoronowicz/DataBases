<?php

$inside = true;

foreach($_POST as $check => $val) {
	if (empty($_POST[$check])) {
		$inside = false;
		break;
	}
}	

if ($inside) {
	$kategoria = $_POST['kategoria'];
	$tytul = $_POST['tytul'];
	$autor = $_POST['autor'];
	
	$link = new mysqli("localhost", "root", "", "biblioteka");
	if (!$link) die("Nie udało się połączyć.");
	$q = "INSERT INTO dzielo (tytul,autor,kategoria) VALUES ('$tytul', '$autor','$kategoria')";
	$result = mysqli_query($link, $q) or die($link->error);
}
$link->close();
header('Location: ksiazki.php');
?>