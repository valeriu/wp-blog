<?php
	echo "<h1>Ajouter</h1>";
	echo "<form action='inc/insertArticle.php' method='POST'";
	echo '<fieldset>';
	echo '<label for="titre">Titre</label>';
	echo '<input type="text" name="titre" value="" id="titre">';
	echo '<label for="texte">Texte de l\'article</label>';
	echo '<textarea name="texte" id="texte" rows="10"></textarea>';
	echo '<label for="auteur">Auteur</label>';
	echo '<input type="text" name="auteur" value="' . $_GET["code_usager"] . '" id="auteur" disabled="disabled">';
	echo '<input hidden type="text" name="utilisateur" value="' . $_SESSION["utilisateur"] . '" id="utilisateur">';
	echo '<label for="motscle">Mots clés</label>';
	echo '<input type="text" name="motscle" value="" id="motscle">';
	echo '<input type="submit" value="Sauvegarder">';
	echo '</fieldset>';
	echo '</form>';
?>