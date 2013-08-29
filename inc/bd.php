<?php
/**
 * Paramètres MySQL et connection
 *
 */
	$user = "valeriu";

	if ($user === "valeriu") 
	{
		//MySQL hostname
		$hostBD = "localhost";
		//Le nom de la base de données
		$nameBD = "blog";
		//Base de données MySQL utilisateur
		$userBD = "root";
		//Base de données MySQL mot de passe
		$passBD = "";
	} 
	else if ($user === "louis") 
	{
		//MySQL hostname
		$hostBD = "localhost";
		//Le nom de la base de données
		$nameBD = "blog";
		//Base de données MySQL utilisateur
		$userBD = "root";
		//Base de données MySQL mot de passe
		$passBD = "chezmoi";
	} 
	else 
	{
		//cegep
		//MySQL hostname
		$hostBD = "localhost";
		//Le nom de la base de données
		$nameBD = "e1296026";
		//Base de données MySQL utilisateur
		$userBD = "e1296026";
		//Base de données MySQL mot de passe
		$passBD = "********";
	}
	//connect BD
	$connectBD = mysqli_connect($hostBD,$userBD,$passBD,$nameBD);
	
	// Check connection
	if (mysqli_connect_errno($connectBD))	
	{
		echo "Erreur de connection avec MySQL: " . mysqli_connect_error();
		exit();
	}

?>