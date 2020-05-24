<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

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
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" placeholder="Wpisz login" required/> <br />
		Hasło: <br /> <input type="password" name="haslo" placeholder="Wpisz hasło" required /> <br /><br />
		<input type="submit" value="Zaloguj się" />
		<button><a href=rejestracja.php>Zarejestruj się!</a></button>
	</form>

<?php
unset($_SESSION['odpowiedzi1']);
	unset($_SESSION['blad2']);
	unset($_SESSION['wypelnione']);
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>