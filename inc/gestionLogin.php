<?php
	session_start();

	unset($_SESSION["msg_erreur"]);
	unset($_SESSION["msg_succes"]);
	
	if (isset($_POST["code_usager"]) && isset($_POST["mot_de_passe"]))
	{
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
	

	$connectBD = mysqli_connect($hostBD,$userBD,$passBD,$nameBD);
		
		//envoi de la requête
		$requete = "SELECT * from usagers where code_usager = '" 
					. mysqli_real_escape_string($connectBD, $_POST["code_usager"]) 
					. "' and mot_de_passe = '" 
					. mysqli_real_escape_string($connectBD, md5($_POST["mot_de_passe"])) . "'";
		
		$resultats = mysqli_query($connectBD, $requete);
		
		if ($resultats)
		{
			$rangee = mysqli_fetch_assoc($resultats);

			if ($rangee)
			{
				$_SESSION["code_usager"] = $_POST["code_usager"];
				$_SESSION["msg_succes"] = "Bonjour " . $rangee["prenom"];
			}
			else
			{
				$_SESSION["msg_erreur"] = "Mauvaise combinaison Utilisateur et Mot de passe";
			}
		}
		else
		{
			$_SESSION["msg_erreur"] = "Erreur de requête SQL";
		}
	}
    // permet de faire un go back (revenir à l'appelant
    header("Location: {$_SERVER['HTTP_REFERER']}");
?>		