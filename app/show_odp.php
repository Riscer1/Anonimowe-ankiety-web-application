<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	if (isset($_POST['wyslij']))
	{
		$kod=$_POST['kod'];
		$ankiety_id=$_POST['Ankiety_nazwa'];
		$polaczenie = new mysqli('localhost', 'root' , '' , 'projekt');
		$kod=md5($kod);

		$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
		$z3=("select odp,hash_odp from odpowiedzi where id_ankiety='".$ankiety_id."';");
		$result3 = mysqli_query($con,$z3);

		while($r3=mysqli_fetch_array($result3)){
			$test1 = $r3['odp'];
			$kod1=$kod.(md5($test1));
			if( $kod1==$r3['hash_odp'])
				$kod2=$kod1;
		}
		if (@$kod2==''){
			$_SESSION['blad2'] = '<span style="color:red">Podałeś zły kod lub ktoś edytował Twoje odpowiedzi zglos sie do administratora!</span>';
				header('Location: show_odp.php');
			}
		$z=("select odp,hash_odp from odpowiedzi where id_ankiety='".$ankiety_id."' and hash_odp='".@$kod2."';");

		
		$z1=("select pytania_tresc from pytania where ankiety_id='".$ankiety_id."';");		
		$result = mysqli_query($con,$z);
		$result1 = mysqli_query($con,$z1);
		$ile_znalezionych =$result1->num_rows;

		while($r=mysqli_fetch_array($result)){
		$i=1;
		$j=0;
		mysqli_data_seek($result1, 0);
		$_SESSION['odp'] = $r['odp'];
		$_SESSION['hash_odp'] = $r['hash_odp'];
		$odp=$_SESSION['odp'];
		$true=$kod.(md5($_SESSION['odp']));
		if ($true==$_SESSION['hash_odp'])

		//echo "Hura nikt nie edytował Twoich odpowiedzi oto one:";
		//echo "</br>";
		//echo "</br>";

			$odp_rozdzielone = explode("_", $odp);
			count($odp_rozdzielone);
			@$_SESSION['odpowiedzi1'].="Hura nikt nie edytował Twoich odpowiedzi oto one:";
			@$_SESSION['odpowiedzi1'].="</br>";
			while($j<$ile_znalezionych){
			$wiersz=$result1->fetch_assoc();
			@$_SESSION['odpowiedzi1'].=$wiersz['pytania_tresc'];
			//echo $wiersz['pytania_tresc'];
			@$_SESSION['odpowiedzi1'].="</br>";
			//echo "</br>";
			@$_SESSION['odpowiedzi1'].=@$odp_rozdzielone[$i]."<br/>";
			//echo @$odp_rozdzielone[$i]."<br/>";
			@$_SESSION['odpowiedzi1'].="</br>";
			//echo "</br>";
		$i++;
		$j++;
	}
	//}

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
<div id="glowna">
<?php
	if(isset($_SESSION['blad2']))	echo $_SESSION['blad2'];
	echo @$_SESSION['odpowiedzi1'];
?>

</div>


</body>
</html>