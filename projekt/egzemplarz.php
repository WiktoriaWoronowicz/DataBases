<?php

$title = "YourLibrary.pl";
include 'widok.php';

$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q="SELECT * from wydawnictwo order by id_wyd";
$q1="SELECT * from dzielo order by tytul";
$result = mysqli_query($link, $q) or die($link->error);
?>
<br><br>
<div id="nowy_egzemplarz"><h3>Dodaj egzemplarz tego dzieła</h3>
	<form method="POST" action="nowy_egzemplarz.php?t=dodaj&id_dzielo=<?php echo $id_dzielo?>">
		<select name = "wyd_id">
		<option value = "wyd_id"> Wydawnictwo</option>
		<?php
		while($row=mysqli_fetch_array($result)){
			echo "<option value='" . $row[0] . "'>'" . $row[1] . "'</option>";
		}?></select>
		Rok wydania: <input type="number" name="rok_wydania" min="0" style="width: 80px;" value="2000">
		<input type="text" name="sygnatura" value="Sygnatura">
		<input type="submit" value="Potwierdź" name = "dodaj">
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
?>
<div>
	<table id="egztable">
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
			<td><?php echo "<a class=\"rezerwacjia\" href=\"rezerwacja.php?id_dzielo={$row['id_dzielo']}\">Rezerwuj</a>" ?></td>

		</tr>
		<?php endwhile; ?>
	</table>
</div>