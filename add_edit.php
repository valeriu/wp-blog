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
<?php
	if (isset($_GET["message"]))
	{
		echo '<div class="message succes">' . $_GET["message"] . '</div>';
	}

	if (isset($_GET["article"]))
	{
		include "inc/modifierUnArticle.php";
	}
	else
	{
		include "inc/ajouterUnArticle.php";
	}
?>
	</div>


	</div>
	<div class="clear"></div>
</div>
<?php include "inc/footer.php"; ?>
</div>
</body>
</html>