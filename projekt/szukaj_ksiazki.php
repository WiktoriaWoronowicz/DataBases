<?php

$title = "Wyszukiwanie";
include 'widok.php';

$szukanie = $_POST['search'];
echo $szukanie;
$szukanie = htmlentities($szukanie, ENT_QUOTES, "UTF-8");
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");

$result = mysqli_query($link, sprintf("SELECT * FROM dzielo WHERE tytul like '%%%s%%' OR autor like '%%%s%%' ORDER BY tytul", 
mysqli_real_escape_string($link, $szukanie),
mysqli_real_escape_string($link, $szukanie))) or die($link->error);

?>

<br>
<div>
	<table>
		<thead>
			<tr>
				<th>Tytuł</th>
				<th>Autor</th>
				<th>Kategoria</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<div id = "szukaj">
		<tr>
			<td><?php echo $row['tytul']; ?></td>
			<td><?php echo $row['autor']; ?></td>
			<td><?php echo $row['kategoria']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"edytuj_dzielo.php?id_dzielo={$row['id_dzielo']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"usun_ksiazke.php?id_dzielo={$row['id_dzielo']}\">Usuń</a>" ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"egzemplarz.php?id_dzielo={$row['id_dzielo']}\"> Rezerwuj egzemplarz </a>" ?></td>
		</tr></div>
		<?php endwhile; ?>
	</table>
</div>