<?php 	
	include "inc/sessions.php";
	// include "inc/bd.php";
	include "inc/library.php";
	include "inc/head.php";
?>
<body>
<div id="container">
<?php 	
	include "inc/header.php";
	include "inc/login.php";
	include "inc/links.php";
?>
<div>
	<div id="content">

	<div class="add-edit">
		<h1>Ajouter ou Modifier</h1>

		<div class="message erreur">Accusamus, expedita error dolore ipsam natus doloribus!</div>
		<div class="message succes">Perspiciatis animi consectetur impedit ab totam reiciendis!</div>

		<form action="">
			<fieldset>
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre">

				<label for="texte">Texte de l’article</label>
				<textarea name="texte" id="texte"  rows="10"></textarea>

				<label for="auteur">Auteur</label>
				<input type="text" name="auteur" id="auteur" disabled="disabled" value="<?php echo $_SESSION["auteur"] ?>">

				<label for="motscles">Mots clés</label>
				<input type="text" name="motscles" id="motscles">

				<input type="submit" value="Sauvegarder">
			</fieldset>
		</form>

	</div>


	</div>
	<div class="clear"></div>
</div>
<?php include "inc/footer.php"; ?>
</div>
</body>
</html>