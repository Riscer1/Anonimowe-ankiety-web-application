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
		$polaczenie = new mysqli('localhost', 'root' , '' , 'projekt');
		$login=$_SESSION['user'];
		$odpowiedz='';

		$con=mysqli_connect("localhost","root","","projekt") or die(mysqli_error());
		$z=("select ankiety_nazwa from ankiety where ankiety_id=".$_SESSION['ankiety_id'].";");
		$result = mysqli_query($con,$z);

		while($r=mysqli_fetch_array($result)){
			$_SESSION['ankiety_nazwa']=$r['ankiety_nazwa'];
		}

		while( list( $field, $value ) = each( $_POST )) {
   		//echo "<p>".$value." ".$field." ";
   		if ($value!='Prześlij' and $field!='kod'){
   		$odpowiedz=$odpowiedz.'_'.$value;}

		}	
		$hash=md5($odpowiedz);
		$kod=md5($kod);
		$hash=$kod.$hash;
		$polaczenie->query("INSERT INTO odpowiedzi VALUES ('','".$odpowiedz."','".$hash."','".$_SESSION['ankiety_id']."');");
		$polaczenie->query("INSERT INTO ankiety_wypelnione VALUES ('','".$login."','".$_SESSION['ankiety_nazwa']."','".$_SESSION['ankiety_id']."');");
		unset($_SESSION['ankiety_nazwa']);
		unset($_SESSION['powodzenie']);
		$_SESSION['powodzenie'] = '<span style="color:red">Pomyślnie udzielono odpowiedzi!</span>';
		header('Location: gra.php');

	}

?>