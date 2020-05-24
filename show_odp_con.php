<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
unset($_SESSION['powodzenie']);
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ankiety</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body bgcolor="#FFFFFF" leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
	<dt>Anonimowe ankiety</dt>
	<?php
	unset($_SESSION['odpowiedzi1']);
	unset($_SESSION['blad2']);
	unset($_SESSION['wypelnione']);
	echo "<div id='menu'>";
	echo "<ul>";
	echo "<p>Witaj ".$_SESSION['user'].'!';
	echo "<div id='email'><b>E-mail</b>: ".$_SESSION['email']."</div></p>";
	echo "<li> <a href=ankieta.php>Wybor ankiety</a></li>";
	echo "<li> <a href=show_odp_con.php>Moje odpowiedzi</a></li>";
	if($_SESSION['user']=='Admin')
	{ 	

		echo "<li><a href=dodajankiete.php>Dodaj ankiete</a></li>";
		echo "<li><a href=dodajpytania.php>Dodaj pytanie do ankiety</a></li>";
		echo "<li><a href=dodajodp.php>Dodaj odp do pytania</a></li>";
		echo "<li><a href=check_user.php>Sprawdź kto wypełnił</a></li>";
		

	}
		echo "<li> <a href=logout.php>Wyloguj mnie</a></li>";
	echo "</ul></div>";
?>
	<div id="glowna">
	<form action="show_odp.php" method="post">
			<br />
	Wybierz której ankiety wyświetlić odpowiedzi:</br>
	<?php

$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
$z=("select ankiety_id,Ankiety_nazwa from ankiety_wypelnione where Login='".$_SESSION['user']."';");
$result = mysqli_query($con,$z);
echo "<select name='Ankiety_nazwa'>";
while($r=mysqli_fetch_row($result)){
	echo "<option value='".$r[0]."'>".$r[1]."</option>";
}
echo "</select>";

	?>
	<br />
	<br />
	Dla potwierdzenia podaj swoje hasło/lub unikatowy kod.<br />
		<input type="password" name="kod" /><br /><br />
		<input type="submit" name="wyslij" />
	
	</form>
</div>


</body>
</html>