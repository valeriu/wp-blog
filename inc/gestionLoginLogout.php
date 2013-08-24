<?php
	session_start();
	unset($_SESSION["msg_erreur"]);

	if (isset($_GET["logout"]))
	{
  		//détruire les variables session utilisateur
		unset($_SESSION["utilisateur"]);
		unset($_SESSION["msg_erreur"]);
		unset($_SESSION["bonjour"]);

		//détruire la session de l'usager 
		session_destroy();
	}	
	else
	{
		include "bd.php";

		//envoi de la requête
		$requete = "SELECT * from usagers where code_usager = '" 
					. mysqli_real_escape_string($connectBD, $_POST["utilisateur"]) 
					. "' and mot_de_passe = '" 
					. mysqli_real_escape_string($connectBD, md5($_POST["motpasse"])) . "'";
		
		$resultats = mysqli_query($connectBD, $requete);
		
		if ($resultats)
		{
			$rangee = mysqli_fetch_assoc($resultats);

			if ($rangee)
			{
				$_SESSION["utilisateur"] = $_POST["utilisateur"];
				$_SESSION["bonjour"] = "Bonjour, " . $rangee["nom"] . " " . $rangee["prenom"];
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
    header('Location: ../index.php');
?>