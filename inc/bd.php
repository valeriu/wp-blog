<?php
	
	$user = "louis";

	if ($user === "valeriu") {
		$hostBD = "localhost";
		$nameBD = "directory";
		$userBD = "root";
		$passBD = "";
	} 
	else if ($user === "louis") {
		$hostBD = "localhost";
		$nameBD = "blog";
		$userBD = "root";
		$passBD = "chezmoi";
	} else {
		//cegep
		$hostBD = "localhost";
		$nameBD = "directory";
		$userBD = "root";
		$passBD = "";
	}
	

	$conectBD = mysqli_connect($hostBD,$userBD,$passBD,$nameBD);
	// Check connection
	if (mysqli_connect_errno($conectBD))	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

?>