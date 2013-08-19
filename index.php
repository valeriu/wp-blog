<?php 	
	include "inc/sessions.php";
	include "inc/bd.php";
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
<div class="post">
	<h1><a href="#edit" class="edit">[edit]</a> <a href="post.php">Introduction</a></h1> 

	<div class="text">
		<p> Hello and welcome to miniBLOG! This is just a simple, small template designed specifically for the blog obsessives. Regarding colours, I've left everything very plain using mainly greys. These colours are all easily changed via the stylesheet. The backgorund image can be changed easily too by opening it in a graphics program and adjusting the hue/saturation. Got something to say? Say it with miniBLOG! </p>
	<p> Speaking of the background image, it was created using a pattern which can be found on squidfingers.com. </p>
	</div>
	
	<div class="meta">
		<span>Posted on 15 December 2013 by :</span> <a href="#">Valeriu Tihai</a> <br>
		<span>Les mots-clés : </span><a href="">mot1</a>, <a href="">Mot2</a>, <a href="">Mot3</a>
	</div>
	
</div>


<div class="post">
		<h1><a href="post.php">CSS &amp; XHTML</a></h1>
		
	<div class="text">	
		<p> As you would expect, this web site makes use of css for its entire layout. No nasty tables here baby! The markup is also valid XHTML 1.1 strict. CSS &amp; XHTML are important for the following reasons: </p>
		<ul>
			<li>Accessibility. Big subject</li>
			<li>Keeping file sizes small</li>
			<li>Search Engine Optimisation</li>
			<li>Loads more</li>
		</ul>
		<p> Anyway, this site validates as both <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> and <a href="http://validator.w3.org/check?uri=referer">XHTML 1.1 Strict</a> compliant. Which is nice. </p>
	</div>

	<div class="meta">
		<span>Posted on 15 December 2013 by :</span> <a href="#">Valeriu Tihai</a> <br>
		<span>Les mots-clés : </span><a href="">mot1</a>, <a href="">Mot2</a>, <a href="">Mot3</a>
	</div>
</div>


	</div>
	<div class="clear"></div>
</div>
<?php include "inc/footer.php"; ?>
</div>
</body>
</html>
