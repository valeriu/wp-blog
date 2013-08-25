<?php
unset($_SESSION["msg_erreur"]);

include "bd.php";

//envoi de la requête

$requete = "SELECT *
			FROM articles AR
			INNER JOIN usagers US
			ON AR.id_usager = US.id_usager
			INNER JOIN articles_mots_cle AM
			ON AR.id_article = AM.id_article
			INNER JOIN mots_cle MC
			ON AM.id_mot_cle = MC.id_mot_cle;";

$resultats = mysqli_query($connectBD, $requete);

if ($resultats)
{
	while($rangee = mysqli_fetch_assoc($resultats))
	{
		echo '<div class="post">';
		echo '<h1><a href="add_edit.php?article=modifier" class="edit">[edit]</a> <a href="post.php">' . $rangee["titre"] . '</a></h1>';
		echo '<div class="text">';
		echo '<p>' . $rangee["contenu"] . '</p>';
		echo '</div>';
		echo '<div class="meta">';
		echo '<span>Posted by :</span> <a href="#">' . $rangee["code_usager"] . '</a> <br>';
		echo '<span>Les mots-clés : </span><a href="">' . $rangee["mot_cle"] . '</a>';
		echo '</div>';
		echo '</div>';
	}
}
else
{
	$_SESSION["msg_erreur"] = "Erreur de requête SQL";
}
?>