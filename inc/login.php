<div id="sidebar">
<?php
	if (isset($_SESSION["msg_erreur_side_bar"]))
	{
		echo '<div class="message erreur">' . $_SESSION["msg_erreur_side_bar"] . '</div>';
	}
	if (isset($_SESSION["utilisateur"]))
	{
		echo '<h3>Salut, ' . $_SESSION["PrenomNom"] . '</h3>';
		echo '<ul class="submenu">';
		echo '<li><a href="add_edit.php?code_usager=' . $_SESSION["code_usager"] . '">Ajouter billet de blog</a></li>';
		echo '<li><a href="index.php">Voir les billets de blog</a></li>';
		echo '<li><a href="inc/gestionLoginLogout.php?logout=true">Déconnexion</a></li>';
		echo '</ul>';
	}
	else
	{
		echo '<h3>Connecter</h3>';
		echo "<form action='inc/gestionLoginLogout.php' method='POST' class='connecter'>";
		echo "<fieldset>";
		echo '<label for="utilisateur">Utilisateur</label>';
		echo '<input type="text" name="utilisateur" id="utilisateur">';
		echo '<label for="motpasse">Mot de passe</label>';
		echo '<input type="password" name="motpasse" id="motpasse">';
		echo '<input type="submit" value="S\'identifier">';
		echo '</fieldset>';
		echo '</form>';
	}
?>