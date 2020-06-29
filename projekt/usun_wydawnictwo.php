<?php
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q = "DELETE FROM wydawnictwo WHERE id_wyd={$_GET['id_wyd']}";

mysqli_query($link, $q) or die($link->error);

$link->close();

header('Location: wydawnictwa.php');
?>