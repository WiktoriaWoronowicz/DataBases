<?php

$title = "Wyszukiwanie";
include 'widok.php';

$szukanie = $_POST['search'];
echo $szukanie;
$szukanie = htmlentities($szukanie, ENT_QUOTES, "UTF-8");
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");

$result = mysqli_query($link, sprintf("SELECT * FROM wydawnictwo WHERE nazwa_wyd like '%%%s%%' ORDER BY nazwa_wyd", 
mysqli_real_escape_string($link, $szukanie),
mysqli_real_escape_string($link, $szukanie))) or die($link->error);

?>

<br>
<div>
	<table>
		<thead>
			<tr><br>
				<th>Nazwa wydawnictwa</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr>
			<td><?php echo $row['nazwa_wyd']; ?></td>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"edytuj_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"usun_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Usuń</a>" ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>