<?php

$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$inside = true;
include 'widok.php';	

$t=$_GET['t'];
if ($t=='dodaj') {
	$link = new mysqli("localhost", "root", "", "biblioteka");
	if (!$link) die("Nie udało się połączyć.");
	$id_dzielo = $_POST['id_dzielo'];
	$id_wyd = $_POST['id_wyd'];
	$rok_wydania = $_POST['rok_wydania'];
	$sygnatura = $_POST['sygnatura'];
	
	$q = "INSERT INTO egzemplarz (dzielo_id,wyd_id,rok_wydania,sygnatura) VALUES ('$dzielo_id','$wyd_id','$rok_wydania', '$sygnatura')";
	mysqli_query($link, $q) or die($link->error);
	header("Location: egzemplarz.php?id_dzielo=$id_dzielo");
}
$link->close();
?>