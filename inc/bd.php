<?php

	$user = "valeriu";

	if ($user === "valeriu") 
	{
		$hostBD = "localhost";
		$nameBD = "blog";
		$userBD = "root";
		$passBD = "";
	} 
	else if ($user === "louis") 
	{
		$hostBD = "localhost";
		$nameBD = "blog";
		$userBD = "root";
		$passBD = "chezmoi";
	} 
	else 
	{
		//cegep
		$hostBD = "localhost";
		$nameBD = "e1296026";
		$userBD = "e1296026";
		$passBD = "********";
	}
	
	$connectBD = mysqli_connect($hostBD,$userBD,$passBD,$nameBD);
	
	// Check connection
	if (mysqli_connect_errno($connectBD))	
	{
		echo "Erreur de connection avec MySQL: " . mysqli_connect_error();
		exit();
	}

?>