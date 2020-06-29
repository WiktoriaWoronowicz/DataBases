<?php

$title = "YourLibrary.pl";
include 'widok.php';

?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css"?v<?php echo time();?>">
</head>
<br>

<div id="nowe_wydawnictwo">
	<h2>WYDAWNICTWA</h2>
	<h3>Wyszukaj wydawnictwo</h3>
		<form action="szukaj_wydawnictwo.php" method="POST"> 
		<input type="text" name="search" value="Wpisz nazwę wydawnictwa">
		<input type="submit" value="Szukaj"></form>
	<form action="nowe_wydawnictwo.php" method="POST">
	<h3>Dodaj nowe wydawnictwo</h3>
		<input type="text" name="nazwa_wyd" value="Nazwa wydawnictwa">
		<input type="submit" value="Potwierdź">
	</form>
</div>
<?php
$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q1 = "SELECT * FROM wydawnictwo order by nazwa_wyd";
$result1 = mysqli_query($link, $q1) or die($link->error);
?>
<br><br>

<div>
	<table id="wydawnictwotable">
		<thead>
			<tr>
				<th>Nazwa wydawnictwa</th>
			</tr>
		</thead>
		
		<?php
			while ($row = $result1->fetch_assoc()): ?>
		<tr>
			<td><?php echo $row['nazwa_wyd']; ?></td>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"edytuj_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Edytuj</a>" ?></td>
			<td><?php echo "<a class=\"nazwa_wyd\" href=\"usun_wydawnictwo.php?id_wyd={$row['id_wyd']}\">Usuń</a>" ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>