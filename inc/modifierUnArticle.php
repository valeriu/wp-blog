<?php
	include "bd.php";

	unset($_SESSION["msg_erreur"]);

	$article = $_GET["article"];
	$requete = "SELECT AR.id_article, AR.titre, AR.contenu, AR.id_usager,
       				US.code_usager, US.nom, US.prenom, AM.id_mot_cle, MC.mot_cle
				FROM articles AR
				INNER JOIN usagers US
				ON AR.id_usager = US.id_usager
				LEFT OUTER JOIN articles_mots_cle AM
				ON AR.id_article = AM.id_article
				LEFT OUTER JOIN mots_cle MC
				ON AM.id_mot_cle = MC.id_mot_cle   
				WHERE AR.id_article = $article
				ORDER BY AR.id_article, MC.id_mot_cle";

	$resultats = mysqli_query($connectBD, $requete);

	if ($resultats)
	{
		$motsCle = "";
		$nbMots = 0;
		while($rangee = mysqli_fetch_assoc($resultats))
		{
				++$nbMots;

				if ($nbMots > 1)
				{
					$motsCle = $motsCle . '&' . $rangee["mot_cle"];
				}
				else
				{
					if (isset($_SESSION["msg_erreur"]))
					{
						echo '<div class="message erreur">' . $_SESSION["msg_erreur"] . '</div>';
					}
					echo "<h1>Modifier</h1>";
					echo "<form action='inc/updateArticle.php' method='POST'";
					echo '<fieldset>';
					echo '<input hidden type="text" name="id_article" value="' . $rangee["id_article"] . '">';
					echo '<label for="titre">Titre</label>';
					echo '<input type="text" name="titre" value="' . $rangee["titre"] . '" id="titre">';
					echo '<label for="texte">Texte de l\'article</label>';
					echo '<textarea name="texte" id="texte" rows="10">' . $rangee["contenu"] . '</textarea>';
					echo '<label for="auteur">Auteur</label>';
					echo '<input type="text" name="auteur" value="' . $rangee["code_usager"] . '" id="auteur" disabled="disabled">';
					echo '<label for="motscle">Mots clés</label>';
					$motsCle = $rangee["mot_cle"];
				}
		}
		echo '<input type="text" name="motscle" value="' . $motsCle . '" id="motscle">';
		echo '<input hidden type="text" name="motsCleAvantMAJ" value="' . $motsCle . '">';
		echo '<input type="submit" value="Sauvegarder">';
		echo '</fieldset>';
		echo '</form>';
	}
	else
	{
		$_SESSION["msg_erreur"] = "Erreur de requête SQL";
		echo '<div class="message erreur">' . $_SESSION["msg_erreur"] . '</div>';
	}
?>