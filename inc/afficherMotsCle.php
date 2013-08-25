<?php
unset($_SESSION["msg_erreur"]);

include "bd.php";

//envoi de la requête

$requete = "SELECT MC.id_mot_cle , MC.mot_cle,
			(SELECT count(*) 
		  	FROM articles_mots_cle AM
			WHERE MC.id_mot_cle = AM.id_mot_cle) as nombre
			FROM mots_cle MC
			ORDER BY nombre DESC";

$resultats = mysqli_query($connectBD, $requete);

if ($resultats)
{
	while($rangee = mysqli_fetch_assoc($resultats))
	{
		echo '<li>(' . $rangee["nombre"] . ') <a href="index.php?motCle=' . $rangee["id_mot_cle"] . '">' . $rangee["mot_cle"] . '</a></li>';
	}
}
else
{
	$_SESSION["msg_erreur"] = "Erreur de requête SQL";
}
?>