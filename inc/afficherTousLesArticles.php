<?php
	include "bd.php";

	unset($_SESSION["msg_erreur"]);

	if (isset($_GET["motCle"]))
	{
		$motCle = $_GET["motCle"];
		$requete = 'SELECT AR.id_article, AR.titre, AR.contenu, AR.id_usager,
       				US.code_usager, US.nom, US.prenom, AM.id_mot_cle, MC.mot_cle
					FROM articles AR
					INNER JOIN usagers US
					ON AR.id_usager = US.id_usager
					INNER JOIN articles_mots_cle AM
					ON AR.id_article = AM.id_article
					INNER JOIN mots_cle MC
					ON  AM.id_mot_cle = MC.id_mot_cle
					WHERE AR.id_article IN
					(SELECT id_article 
					 FROM articles_mots_cle AM
					 INNER JOIN mots_cle MC
					 ON  AM.id_mot_cle = MC.id_mot_cle
					 WHERE MC.id_mot_cle = "' . $motCle . '")
					ORDER BY AM.id_article DESC';
	}
	else if (isset($_GET["utilisateur"]))
	{
		$utilisateur = $_GET["utilisateur"];
		$requete = "SELECT AR.id_article, AR.titre, AR.contenu, AR.id_usager,
       				US.code_usager, US.nom, US.prenom, AM.id_mot_cle, MC.mot_cle
					FROM articles AR
					INNER JOIN usagers US
					ON (AR.id_usager = US.id_usager AND AR.id_usager = $utilisateur) 
					LEFT OUTER JOIN articles_mots_cle AM
					ON AR.id_article = AM.id_article
					LEFT OUTER JOIN mots_cle MC
					ON AM.id_mot_cle = MC.id_mot_cle
					ORDER BY AR.id_article DESC";
	}
	else
	{
		$requete = "SELECT AR.id_article, AR.titre, AR.contenu, AR.id_usager,
       				US.code_usager, US.nom, US.prenom, AM.id_mot_cle, MC.mot_cle
					FROM articles AR
					INNER JOIN usagers US
					ON AR.id_usager = US.id_usager
					LEFT OUTER JOIN articles_mots_cle AM
					ON AR.id_article = AM.id_article
					LEFT OUTER JOIN mots_cle MC
					ON AM.id_mot_cle = MC.id_mot_cle
					ORDER BY AR.id_article DESC";
	}

	$resultats = mysqli_query($connectBD, $requete);

	if ($resultats)
	{
		$dernierArticleLu = "";
		while($rangee = mysqli_fetch_assoc($resultats))
		{
			if ($dernierArticleLu != $rangee["id_article"])
			{
				if ($dernierArticleLu != "")
				{
					echo '</div>';
					echo '</div>';
				}

			    $dernierArticleLu = $rangee["id_article"];
				echo '<div class="post">';

				if (isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"] == $rangee["id_usager"])
				{
					echo '<h1><a class="edit" href="add_edit.php?article=' . $rangee["id_article"] . '">[edit]</a> ' . $rangee["titre"] . '</h1>';
				}
				else
				{
					echo '<h1>' . $rangee["titre"] . '</a></h1>';
				}

				echo '<div class="text">' . $rangee["contenu"] . '</div>';
				echo '<div class="meta">';
				echo '<span>Posted by :</span> <a href="index.php?utilisateur=' . $rangee["id_usager"] . '">' . $rangee["prenom"]." ".$rangee["nom"]. '</a> <br>';
				echo '<span>Les mots-clés : </span><a href="index.php?motCle=' . $rangee["id_mot_cle"] . '">' . $rangee["mot_cle"] . '</a>';
			}
			else
			{
				echo ', <a href="index.php?motCle=' . $rangee["id_mot_cle"] . '">' . $rangee["mot_cle"] . '</a>';
			}
		}

		if ($dernierArticleLu != "")
		{
			echo '</div>';
			echo '</div>';
		}
	}
	else
	{
		$_SESSION["msg_erreur"] = "Erreur de requête SQL";
		echo '<div class="message erreur">' . $_SESSION["msg_erreur"] . '</div>';
	}
?>