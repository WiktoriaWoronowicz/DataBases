<?php
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q = "DELETE FROM studenci WHERE id_student={$_GET['id_student']}";

mysqli_query($link, $q) or die($link->error);

$link->close();

header('Location: index.php');
?>