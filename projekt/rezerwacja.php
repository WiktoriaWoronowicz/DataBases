<?php

session_start();
if (!isset($_SESSION['zalogowano'])) {
	header('Location: logowanie.php');
	exit();
}

$title = "Twoje zamówienia";
include 'widok.php';
$id_student = $_SESSION['id_student'];

$link = new mysqli("localhost", "root", "", "biblioteka");
if (!$link) die("Nie udało się połączyć.");
$q = "SELECT * FROM rezerwacja WHERE student_id='$id_student' ORDER BY data_rezerwacji";
$result = mysqli_query($link, $q) or die($link->error);

?>
<h2>Twoje rezerwacje</h2>

<div>
	<table>
		
		<?php
			while ($row = $result->fetch_assoc()): ?>
		<tr>
			<td><? php echo $login."";?></td>
			<td><?php echo $row['id_rezerwacji']; ?></td>
			<td>Data rezerwacji: <?php echo $row['data_rezerwacji']; ?></td>
			<td>Data odebrania: <?php echo $row['data_odebrania']; ?></td>
			<td>Data zwrócenia: <?php echo $row['data_zwrocenia']; ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>