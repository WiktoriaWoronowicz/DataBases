<?php
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q = "DELETE FROM dzielo WHERE id_dzielo={$_GET['id_dzielo']}";

mysqli_query($link, $q) or die($link->error);

$link->close();

header('Location: index.php');
?>