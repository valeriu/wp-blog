<?php 	
//Page d’affichage des articles par mots clés 
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
?>
<div>
	<div id="content">

	<div class="tag-clouds">
		<h1>Tag Clouds</h1>
<?php 	
	if (isset($_SESSION["msg_erreur"]))
	{
		echo '<div class="message erreur">' . $_SESSION["msg_erreur"] . '</div>';
	}
?>
		<ul>
<?php 	
//Afficher la liste des mots-clés disponibles, triée par ordre de popularité
	include "inc/afficherMotsCle.php";
?>
		</ul>

	</div>


	</div>
	<div class="clear"></div>
</div>
<?php include "inc/footer.php"; ?>
</div>
</body>
</html>