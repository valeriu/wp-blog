<div id="sidebar">
<h3>Connecter</h3>
<?php
	if (isset($_SESSION["msg_erreur"]))
	{
		echo '<div class="message erreur">' . $_SESSION["msg_erreur"] . '</div>';
	}
	else if (isset($_SESSION["msg_succes"]))
	{
		echo '<div class="message succes">' . $_SESSION["msg_succes"]. '</div>';
	}

	if (isset($_SESSION["code_usager"]))
	{
		echo "<form method='POST' class='connecter' action='inc/gestionLogout.php'>";
	}
	else
	{
		echo "<form method='POST' class='connecter' action='inc/gestionLogin.php'>";
	}

?>	
		<form method="POST" class="connecter">
			<fieldset>
				<label for="code_usager">Code usager</label>
				<input type="text" name="code_usager" id="code_usager">
				<label for="mot_de_passe">Mot de passe</label>
				<input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
<?php
	if (isset($_SESSION["code_usager"]))
	{
		echo "<input type='submit' value='Se déconnecter'>";
	}
	else
	{
		echo "<input type='submit' value='Se connecter'>";
	}
?>	
			</fieldset>
		</form>
		<ul class="submenu">
			<li><a href="add_edit.php">Ajouter billet de blog</a></li>
			<li><a href="index.php">Voir les billets de blog</a></li>
		</ul>