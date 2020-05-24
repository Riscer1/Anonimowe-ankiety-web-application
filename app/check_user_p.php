<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	if (isset($_POST['wyslij']))
	{
		$uzytkownicy=$_POST['uzytkownicy'];

		$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
		$z3=("select Login,Ankiety_nazwa from ankiety_wypelnione where Login='".$uzytkownicy."';");
		$result3 = mysqli_query($con,$z3);
		//echo 'Wypełnione ankiety:</br></br>';
		@$_SESSION['wypelnione'].="Wypełnione ankiety przez ";
		@$_SESSION['wypelnione'].=$uzytkownicy;
		@$_SESSION['wypelnione'].="</br>";
		while($r3=mysqli_fetch_array($result3)){
			$user1 = $r3['Ankiety_nazwa'];
			//echo '</br>';
			@$_SESSION['wypelnione'].="</br>";
			@$_SESSION['wypelnione'].=$user1;
			@$_SESSION['wypelnione'].="</br>";
			//echo $user1;
			//echo '</br>';

		}
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

<div id='glowna'>
	<?php
	echo @$_SESSION['wypelnione'];
	?>
</div>


</body>
</html>