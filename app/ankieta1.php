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
	if(isset($_SESSION['powodzenie']))	echo $_SESSION['powodzenie'];
?>
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
	<div id='glowna'><form action="dodawanie.php" method="post">
		<br />

	Pytania:</br>
	<?php

$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
$z=("select pytania_id,pytania_tresc,typpytania from pytania where ankiety_id=".$_SESSION['ankiety_id'].";");
$result = mysqli_query($con,$z);

while($r=mysqli_fetch_array($result)){
	
	echo $r['pytania_tresc'];
	$_SESSION['pytania_id'] = $r['pytania_id'];
	$_SESSION['typpytania'] = $r['typpytania'];

	echo "</br></br>";
	
	if($_SESSION['typpytania']=='text')
	{	
		echo "<input type='text' value='' id='1' name='".$_SESSION['pytania_id']."'></input>";
		echo "</br></br>";

	}

	if($_SESSION['typpytania']=='textarea')
	{	
		echo "<textarea rows='8' cols='60' id='2' name='".$_SESSION['pytania_id']."'></textarea>";
		echo "</br></br>";

	}
	
	if($_SESSION['typpytania']=='wiek')
	{	
		echo "<select name='".$_SESSION['pytania_id']."'>";
		echo "<option value='<18'><18</option>";
		echo "<option value='19'>19</option>";
		echo "<option value='20'>20</option>";
		echo "<option value='21'>21</option>";
		echo "<option value='22'>22</option>";
		echo "<option value='23'>23</option>";
		echo "<option value='24'>24</option>";
		echo "<option value='25'>25</option>";
		echo "<option value='>25'>>25</option>";
		echo "</select>";
		echo "</br></br>";
	}
	if($_SESSION['typpytania']=='skala')
	{
		
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='0'>0</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='1'>1</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='2'>2</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='3'>3</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='4'>4</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='5'>5</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='6'>6</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='7'>7</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='7'>8</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='8'>9</input>";
		echo "<input type='radio' name='".$_SESSION['pytania_id']."' value='10'>10</input>";
		echo "</br></br>";

	}
	

	if (isset($_SESSION['pytania_id'])){

		$z1=("select odp from pytaniaodp where pytania_id=".$_SESSION['pytania_id'].";");
		$result1 = mysqli_query($con,$z1);

	}
	while($r1=mysqli_fetch_array($result1))
	{

	echo "<input type='radio' name='".$_SESSION['pytania_id']."' value=".$r1['odp'].">".$r1['odp']."</input>";
	echo "</br></br>";

	}


	
	
}


	?>
	<br />
	<br />
	Dla potwierdzenia podaj swoje hasło/lub unikatowy kod.<br />
		<input type="password" name="kod" /><br /><br />
		<input type="submit" name="wyslij" />
	
	</form></div>



</body>
</html>