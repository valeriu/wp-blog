<!-- Page ajouter,un article -->
	<h1>Ajouter</h1>
	<form action='inc/insertArticle.php' method='POST'
	<fieldset>
	<label for="titre">Titre</label>
	<input type="text" name="titre" value="" id="titre">
	<label for="texte">Texte de l'article</label>
	<textarea name="texte" id="texte" rows="10"></textarea>
	<label for="auteur">Auteur</label>
	<input type="text" name="auteur" value="<?php echo $_SESSION["PrenomNom"]; ?>" id="auteur" disabled="disabled">
	<input hidden type="text" name="utilisateur" value="<?php echo $_SESSION["utilisateur"]; ?>" id="utilisateur">
	<label for="motscle">Mots clés</label>
	<input type="text" name="motscle" value="" id="motscle">
	<input type="submit" value="Sauvegarder">
	</fieldset>
	<div class="clear"></div></form>