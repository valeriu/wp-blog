<?php 	
	include "inc/sessions.php";
	include "inc/bd.php";
	include "inc/library.php";

	if(!isset($_SESSION["utilisateur"])) {
		header("Location: index.php");
		exit();
	} 

	if(isset($_REQUEST["titre"]) && isset($_REQUEST["texte"]) )
	{
		$titre   	= mysqli_real_escape_string($connectBD, $_REQUEST["titre"]);
		$texte 		= mysqli_real_escape_string($connectBD, $_REQUEST["texte"]);
		$auteur  	= $_SESSION["utilisateur"];
		$motscles	= explode('&', mysqli_real_escape_string($connectBD, $_REQUEST["motscles"]), -1);

		//mot cles
		$motReturn = "";
		$last_key = end(array_keys($motscles));
		foreach ($motscles as $key => $value) {
			# code...
			if ($key == $last_key) {
				$motReturn .= "(NULL, '".$value."');";
				} else {
				$motReturn .= "(NULL, '".$value."'), ";
			}	
		}



		$addArticle = "INSERT INTO articles VALUES (NULL, '$titre', '$texte', $auteur)";
		$addMotsCle = "INSERT INTO mots_cle VALUES $motReturn";
		
	
	mysqli_query($connectBD, $addArticle) or mysql_error();
	mysqli_query($connectBD, $addMotsCle) or mysql_error();

	} else {
		$mess = "nimic";
	}

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
<<<<<<< HEAD
		<h1>Ajouter</h1>

		<form action="" method="POST">
			<fieldset>
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre">

				<label for="texte">Texte de l’article</label>
				<textarea name="texte" id="texte"  rows="10"></textarea>

				<label for="auteur">Auteur</label>
				<input type="text" name="auteur" id="auteur" disabled="disabled" value="<?php echo $_SESSION["PrenomNom"]; ?>">

				<label for="motscles">Mots clés</label>
				<input type="text" name="motscles" id="motscles">

				<input type="submit" value="Sauvegarder">
			</fieldset>
		</form>
<?php 
echo $titre."<br>";
echo $texte."<br>";
echo $addArticle."<br>";
echo $addMotsCle;
//var_dump($motscles);
 ?>
=======
<?php
	include "inc/afficherUnArticle.php";
?>
>>>>>>> louis
	</div>


	</div>
	<div class="clear"></div>
</div>
<?php include "inc/footer.php"; ?>
</div>
</body>
</html>