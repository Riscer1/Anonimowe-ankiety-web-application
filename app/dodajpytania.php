<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	if (isset($_POST['pytania_tresc']))
	{
		@$pytania_tresc= $_POST['pytania_tresc'];
		@$ankiety_id = $_POST['ankiety_id'];
		@$typpytania = $_POST['typpytania'];
		unset($_SESSION['powodzenie']);
			

		require_once "config.php";
		
			$polaczenie = new mysqli('localhost', 'root' , '' , 'projekt');
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				if ($polaczenie->query("INSERT INTO pytania VALUES ('','$pytania_tresc','$ankiety_id','$typpytania');")) 
				{
					$_SESSION['udanarejestracja']=true;
					#header('Location: witamy.php');
					echo"dodano nowa ankiete";
				}
				else
				{
					echo"nie dziala";
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
?>
<div id='glowna'>
	<h1> Formularz dodawania pytań do ankiety</h1>
	<form method="post">
		<br />
	Do której ankiety chcesz dodać pytanie:</br>
	<?php

$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
$z=("select ankiety_id,ankiety_nazwa from ankiety;");
$result = mysqli_query($con,$z);
echo "<select name='ankiety_id'>";
while($r=mysqli_fetch_row($result)){
	echo "<option value='".$r[0]."'>".$r[1]."</option>";
}
echo "</select>";

	?>
	<br />
	Pytanie: <br /> <input type="text" value="" name="pytania_tresc" /><br />
	Typ pytania: <br /> <select name='typpytania'>
		<option value="abcd">ABCD</option>
		<option value="text">TEXT</option>
		<option value="textarea">Dłuższa wypowiedź</option>
		<option value="radio">Pytanie z 1 odpowiedzią</option>
		<option value="wiek">Pytanie o wiek</option>
		<option value="skala">Pytania ze skalą odpowiedzi(0-10)</option>
		<br />

		<input type="submit" value="Dodaj pytanie" />	
	</form></div>


</body>
</html>