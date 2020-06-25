<?php

$title = "YourLibrary.pl";
include 'widok.php';

?>
<br><br>
<?php
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q = "SELECT * FROM studenci";
$result = mysqli_query($link, $q) or die($link->error);
?>
<br><br>
<div>
	<table>
		<thead>
			<tr>
				<th>Indeks</th>
				<th>Login</th>
				<th>Imie</th>
				<th>Nazwisko</th>
				<th>Miasto</th>
				<th>Ulica</th>
				<th>Nr Domu</th>
				<th>Nr lokalu</th>
				<th>Kod pocztowy</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr>
			<td><?php echo $row['indeks']; ?></td>
			<td><?php echo $row['login']; ?></td>
			<td><?php echo $row['imie']; ?></td>
			<td><?php echo $row['nazwisko']; ?></td>
			<td><?php echo $row['miasto']; ?></td>
			<td><?php echo $row['ulica']; ?></td>
			<td><?php echo $row['nr_domu']; ?></td>
			<td><?php echo $row['nr_lokalu']; ?></td>
			<td><?php echo $row['kod_pocztowy']; ?></td>
			<td><?php echo "<a class=\"tytul\" href=\"usun_studenta.php?id_student={$row['id_student']}\">Usuń</a>" ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>
