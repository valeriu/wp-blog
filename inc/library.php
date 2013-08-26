<?php


// title
function afficher_titre() {
	$file_name = trim(basename($_SERVER['PHP_SELF'], ".php").PHP_EOL);

	if ($file_name == "index") {
		$titre = "BLOG multi-usagers - TP2";
	} 
	elseif ($file_name == "tags") {
		$titre = "Mots cles";
	} 
	elseif ($file_name == "add_edit") {
		
		if (isset($_GET["article"])){
		// url structure /add_edit.php?article=modifier			
			$titre = "Modifier billet de blog";
		} else {
			$titre = "Ajouter billet de blog";
		}
	} 
	else {
		$titre = "Blog";
	}
	return $titre; 
}
?>