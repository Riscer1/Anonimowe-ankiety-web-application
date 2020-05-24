<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	if (isset($_POST['nazwa']))
	{
		@$nazwa = $_POST['nazwa'];
		@$data1 = $_POST['data1'];
		@$data2 = $_POST['data2'];
		unset($_SESSION['powodzenie']);

		require_once "config.php";
		
			$polaczenie = new mysqli('localhost', 'root' , '' , 'projekt');
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				if ($polaczenie->query("INSERT INTO ankiety VALUES ('','$nazwa','$data1','$data2');")) 
				{
					$_SESSION['udanarejestracja']=true;
					header('Location: dodajpytania.php');
					echo"Utworzono nowa ankiete";
					echo"Teraz dodaj pytania do ankiety";
				}
				else
				{
					#echo"nie dziala";
					#throw new Exception($polaczenie->error);
				}
					
			}
			
			$polaczenie->close();
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
?><div id='glowna'>
	<h1> Formularz dodawania ankiet</h1>
	<form method="post">
	
		Nazwa: <br /> <input type="text" value="" name="nazwa" /><br />
		Data od: <br /> <input type="Date"  value="" name="data1" /><br />
		Data do: <br /> <input type="Date" value="" name="data2" /><br />
		<br />

		<input type="submit" value="Dodaj ankietę" />
		
	</form></div>


</body>
</html>