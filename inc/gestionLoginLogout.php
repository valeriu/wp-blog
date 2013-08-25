<?php
	session_start();
	unset($_SESSION["msg_erreur_side_bar"]);

	if (isset($_GET["logout"]))
	{
  		//détruire les variables session utilisateur
		unset($_SESSION["utilisateur"]);
		unset($_SESSION["msg_erreur_side_bar"]);
		unset($_SESSION["msg_erreur"]);
		unset($_SESSION["bonjour"]);
		unset($_SESSION["utilisateurConnexionPrenomNom"]);

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
				$_SESSION["bonjour"] = "Bonjour, " . $rangee["nom"] . " " . $rangee["prenom"];
				$_SESSION["utilisateurConnexionPrenomNom"] = $rangee["prenom"] . " " . $rangee["nom"];
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