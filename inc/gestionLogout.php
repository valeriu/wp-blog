<?php
	session_start();

	unset($_SESSION["msg_erreur"]);
	unset($_SESSION["code_usager"]);
	
	$_SESSION["msg_succes"] = "Vous êtes déconnecté";
    
    // permet de faire un go back (revenir à l'appelant
    header("Location: {$_SERVER['HTTP_REFERER']}");
?>			