<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl"><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
<title><?php echo $title; ?></title>
</head>
<body>
<div id="studentsearch">
	<a href="index.php"> Studenci </a>
	<form action="szukaj_studenta.php" method="POST"> 
		<input type="text" name="search" value="Wpisz indeks lub nazwisko">
		<input type="submit" value="Szukaj">
	</form>
	<a href="ksiazki.php"> Książki </a>
	<form action="szukaj_ksiazki.php" method="POST"> 
		<input type="text" name="search" value="Wpisz tytuł lub autora">
		<input type="submit" value="Szukaj">
	</form>
	<a href="rezerwacja.php"> Rezerwacja </a>
	<?php 
	if (isset($_SESSION['zalogowano']) && $_SESSION['zalogowano'] == true) {
		echo '<a class="menu" href="uzytkownik.php">Profil </a>';
		echo '<a class="menu" href="wyloguj.php">Wyloguj </a>';
}
	else {
		echo '<a class="menu" href="rejestracja.php">Rejestracja </a>';
		echo '<a class="menu" href="login.php">Logowanie </a>';
}
	?>
</div>
<div id="main">
</div>
</body>
</html>