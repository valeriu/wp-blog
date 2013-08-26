<?php
	include "bd.php";

	$titre = mysqli_real_escape_string($connectBD, $_POST["titre"]); 
	$texte = mysqli_real_escape_string($connectBD, $_POST["texte"]);
	$id_article = $_POST["id_article"]; 
	$motsCle = trim($_POST["motscle"]); 
	$tabMotsCle = explode(",", $motsCle);
	$motsCleAvantMAJ = trim($_POST["motsCleAvantMAJ"]); 
	$tabMotsCleAvant = explode(",", $motsCleAvantMAJ);

	// les mots clé ont changées par rapport à avant
	if ($motsCle != $motsCleAvantMAJ)
	{
		if ($motsCle != "")
        {
			// Insérer chacun des mots clé qui n'existe pas
			foreach($tabMotsCle as $mot)
			{
				// trouver si le chacun des mots clé existe
				$requete = 'SELECT * 
							FROM mots_cle MC
							INNER JOIN articles_mots_cle AM
							ON (MC.id_mot_cle = AM.id_mot_cle 
							AND MC.mot_cle = "' . $mot . '"AND AM.id_article = ' . $id_article . ')';

				mysqli_query($connectBD, $requete);

				// si ce mot clé existe pas
				if (mysqli_affected_rows($connectBD) == 0)
				{
					// récupérer le id_mot_cle du mot_cle s'il existe
					$requete = 'SELECT * FROM mots_cle WHERE mot_cle = "' . $mot . '"';
					$resultats = mysqli_query($connectBD, $requete);
					$rangee = mysqli_fetch_assoc($resultats);
					
					if (mysqli_affected_rows($connectBD) == 0)
					{
						// insérer ce nouveau mot clé
						$requete = 'INSERT INTO mots_cle (mot_cle)	VALUES ("' . $mot . '")';
						mysqli_query($connectBD, $requete);
						// récupérer le id_mot_cle du nouveau mot_cle
						$requete = 'SELECT * FROM mots_cle WHERE mot_cle = "' . $mot . '"';
						$resultats = mysqli_query($connectBD, $requete);
						$rangee = mysqli_fetch_assoc($resultats);
					}
					
					// insérer les id_article et id_mot_cle
					$requete = 'INSERT INTO articles_mots_cle (id_article, id_mot_cle)
								VALUES (' . $id_article . ',' . $rangee["id_mot_cle"] . ')';
					mysqli_query($connectBD, $requete);
				}
			}
        }
        // Detruire les mots clé qui ont été enlevé
		$present = false;
		$motCleADetruire = "";
		foreach($tabMotsCleAvant as $motAvant)
		{
			foreach($tabMotsCle as $mot)
			{
				if ($motAvant == $mot)
				{
					$present = true;
					break;
				}
			}
			if (!$present)
			{
				if ($motCleADetruire == "")
				{
					$motCleADetruire = $motAvant;
				}
				else
				{
					$motCleADetruire = $motCleADetruire . "," . $motAvant;
				}

			} 
		}
		// on détruit l'article et le mot clé
		// on le mot clé s'il n'est plus utilisé
		if ($motCleADetruire != "")
		{
			// récupérer le id_mot_cle du mot_cle
			$requete = 'SELECT * FROM mots_cle WHERE mot_cle = "' . $motCleADetruire . '"';
			$resultats = mysqli_query($connectBD, $requete);
			$rangee = mysqli_fetch_assoc($resultats);

			$requete = "DELETE FROM articles_mots_cle 
						WHERE  id_article = " . $id_article . 
						" AND id_mot_cle = " . $rangee["id_mot_cle"];
			mysqli_query($connectBD, $requete);
			$requete = "DELETE FROM mots_cle 
						WHERE  id_mot_cle = " . $rangee["id_mot_cle"];
			mysqli_query($connectBD, $requete);
		}
	}

	// Mise à jour du contenu de l'article 
	$requete =  'UPDATE articles SET titre = "' . $titre . '",' .
				'contenu = "' . $texte . '"' .
				'WHERE id_article = ' . $id_article;

	$resultats = mysqli_query($connectBD, $requete);

	if (!$resultats)
	{
		$_SESSION["msg_erreur"] = "Erreur de requête SQL";
	}

	header('Location: ../index.php');
?>