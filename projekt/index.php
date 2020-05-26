<?php

$title = "YourLibrary.pl";
include 'widok.php';

?>
<div id="nowy_student">
	<form action="nowy_student.php" method="POST">
		Indeks: <input type="number" name="indeks" min="0" style="width: 40px;" value="0">
		<input type="text" name="imie" value="Imie">
		<input type="text" name="nazwisko" value="Nazwisko">
		<input type="text" name="miasto" value="Miasto">
		<input type="text" name="ulica" value="Ulica">
		<input type="text" name="nr_domu" value="Nr domu">
		<input type="text" name="nr_lokalu" value="Nr lokalu">
		<input type="text" name="kod_pocztowy" value="Kod pocztowy">
		<input type="submit" value="Potwierdź" style="float: right">
	</form>
</div>
<?php

$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q = "SELECT indeks, imie,nazwisko,miasto,ulica,nr_domu,nr_lokalu,kod_pocztowy FROM studenci";
$result = mysqli_query($link, $q) or die($link->error);
//pre_r($result->fetch_assoc());
?>
<br><br>
<div>
	<table>
		<thead>
			<tr>
				<th>Indeks</th>
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
			<td><?php echo $row['imie']; ?></td>
			<td><?php echo $row['nazwisko']; ?></td>
			<td><?php echo $row['miasto']; ?></td>
			<td><?php echo $row['ulica']; ?></td>
			<td><?php echo $row['nr_domu']; ?></td>
			<td><?php echo $row['nr_lokalu']; ?></td>
			<td><?php echo $row['kod_pocztowy']; ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>