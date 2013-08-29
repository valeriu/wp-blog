<?php
/**
 * Gestion login et logout, gerer les sessions
 */
	include "sessions.php"; 
	unset($_SESSION["msg_erreur_side_bar"]);

	if (isset($_GET["logout"]))
	{
  		//détruire les variables session utilisateur
		unset($_SESSION["utilisateur"]);
		unset($_SESSION["msg_erreur_side_bar"]);
		unset($_SESSION["msg_erreur"]);
		unset($_SESSION["PrenomNom"]);
		unset($_SESSION["code_usager"]);

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
				$_SESSION["utilisateur"] = $rangee["id_usager"];
				$_SESSION["PrenomNom"] = $rangee["prenom"] . " " . $rangee["nom"];
				$_SESSION["code_usager"] = $rangee["code_usager"];
			}
			else
			{
				$_SESSION["msg_erreur_side_bar"] = "Mauvaise combinaison Utilisateur et Mot de passe";
			}
		}
		else
		{
			$_SESSION["msg_erreur_side_bar"] = "Erreur de requête SQL";
		}
	}
    header('Location: ../index.php');
?>