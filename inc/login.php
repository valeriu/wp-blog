<div id="sidebar">
<h3>Connecter</h3>

	<div class="message erreur">Accusamus, expedita!</div>
	<div class="message succes">Perspiciatis animi!</div>

		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="connecter">
			<fieldset>
				<label for="code_usager">Code usager</label>
				<input type="text" name="code_usager" id="code_usager">

				<label for="mot_de_passe">Mot de passe</label>
				<input type="password" name="mot_de_passe" id="mot_de_passe">
				</br>
				<input type="submit" value="S'identifier">
			</fieldset>
		</form>

		<h3>Salut, Nom Prenom</h3>
		<ul class="submenu">
			<li><a href="add_edit.php">Ajouter billet de blog</a></li>
			<li><a href="index.php">Voir les billets de blog</a></li>
			<li><a href="#contact">Déconnexion</a></li>
		</ul>

<?php
	if(isset($_POST["code_usager"]) && isset($_POST["mot_de_passe"]))
	{
		//sélection de la base de données
		$selection = mysqli_select_db($connectBD, "blog");	
	
		//envoi de la requête
		$requete = "SELECT * from usagers where code_usager = '" 
					. mysqli_real_escape_string($connectBD, $_POST["code_usager"]) 
					. "' and mot_de_passe = '" 
					. mysqli_real_escape_string($connectBD, md5($_POST["mot_de_passe"])) . "'";
		$resultats = mysqli_query($connectBD, $requete);
		
		if($resultats)
		{
			$rangee = mysqli_fetch_assoc($resultats);
			if($rangee)
			{
				afficherMessage("Bonjour " . $rangee["prenom"],false);
			}
			else
			{
				afficherMessage("Mauvaise combinaison Utilisateur et Mot de passe",true);
			}
		}
		else
			afficherMessage("Erreur de requête SQL",true);
	}
	else
	{
		afficherMessage("Vous devez inscrire le code mot de passe",true);
	}
?>		