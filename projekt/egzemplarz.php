<?php

$title = "YourLibrary.pl";
include 'widok.php';
?>

<br><br>
<div id="nowy_egzemplarz">
	<form action="#" method="POST">
		<input type="text" name="nazwa_wyd" value="Wydawnictwo">
		Rok wydania: <input type="number" name="rok_wydania" min="0" style="width: 40px;" value="0">
		<input type="text" name="nazwa_wyd" value="Sygnatura">
		<input type="submit" value="Potwierdź">
	</form>
</div>

<?php

$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$id_dzielo=$_GET['id_dzielo'];
$q = "SELECT * FROM dzielo WHERE id_dzielo={$_GET['id_dzielo']}";

$result = mysqli_query($link, $q) or die($link->error);
$row = $result->fetch_assoc();

echo "<h2>".$row['tytul']."</h2>";
echo "<h3>".$row['autor']."</h2>";
?>

<br><br>

<?php

$q1 = "SELECT nazwa_wyd, egzemplarz.* FROM egzemplarz JOIN wydawnictwo ON id_wyd=wyd_id WHERE dzielo_id={$_GET['id_dzielo']}";
$result1 = mysqli_query($link, $q1) or die($link->error);
$result2 = mysqli_query($link, $q1) or die($link->error);
?>
<div>
	<table>
		<thead>
			<tr>
				<th>Nazwa Wydawnictwa</th>
				<th>Rok Wydania</th>
				<th>Sygnatura</th>
			</tr>
		</thead>
		
		<?php
			while ($row1 = $result1->fetch_assoc()): ?>
		<tr>
			<td><?php echo $row1['nazwa_wyd']; ?></td>
			<td><?php echo $row1['rok_wydania']; ?></td>
			<td><?php echo $row1['sygnatura']; ?></td>

		</tr>
		<?php endwhile; ?>
	</table>
</div>