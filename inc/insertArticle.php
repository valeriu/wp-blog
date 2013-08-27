<?php
	include "sessions.php"; 
	include "bd.php";

	unset($_SESSION["msg_erreur"]);

	$titre = mysqli_real_escape_string($connectBD, $_POST["titre"]); 
	$contenu = mysqli_real_escape_string($connectBD, $_POST["texte"]);
	$id_usager = $_POST["utilisateur"];
	
	$motsCle = trim($_POST["motscle"]); 
	$tabMotsCle = explode("&", $motsCle);

	if (($titre !="") && ($contenu != "") && ($motsCle != "")) {
		
	
		// insertion du contenu de l'article 
		$requete =  'INSERT INTO articles 
					 (titre,contenu,id_usager)  
					 VALUES ("' . $titre. '", "' . $contenu . '", ' . $id_usager . ')';				

		$resultats = mysqli_query($connectBD, $requete);

		if (!$resultats)
		{
			$_SESSION["msg_erreur"] = "Erreur de requête SQL";
		}
		else
		{
			// récupérer le dernier id_article
			$requete = 'SELECT MAX(id_article) as id_article FROM articles';
			$resultats = mysqli_query($connectBD, $requete);
			$rangee = mysqli_fetch_assoc($resultats);
			$id_article = $rangee["id_article"];

			// Insérer chacun des mots clé qui n'existe pas
			foreach($tabMotsCle as $mot)
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

		header('Location: ../add_edit.php?message=Article a été bien ajouté');
	} else {
		header("Location: ../add_edit.php?messageerr=Sil vous plaît remplir tous les champs");
	}
?>