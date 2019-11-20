<!-- Page de presentation de l'auteur -->
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Projet 4 PHP</title>
  <link rel="stylesheet" href="style.css">
  <!--  Bootstrap css link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="script.js"></script>
  
</head>

<body>
	<header>
		<?php include("header.php");?>
	</header>
		<?php include("nav.php"); ?>
		<br>
		<div id="titre">
			<h3>L'auteur</h3>
		</div>
		
		<div class="jumbotron">
			<div class="row">
				<div class="col text-center">
					<img class="img-fluid" src="images/george.jpg">
				</div>
				<div class="col">
					Jean Forteroche, né le 25 mai 1968 à Saint Cloud (92), est un écrivain français de science fiction et de fantasy, également scénariste et producteur de télévision.<br> Son oeuvre la plus connue est la série romanesque du <i>trône de fer</i>, adaptée sous forme de série télévisée par M6 sous le titre de <i>Jeux des trônes</i>.<br> Il a été recompensé par de nombreux prix littéraires et a été selectionné par le magazine <i>Telé zap</i> comme l'une des plus influentes de France en 2011. Il est considéré comme le "Tolkien français".
				</div>
			</div>
			<dir class="row">
				<div class="col">
					<h3 class="title text-center">Oeuvres</h3>
					<h4 class="title text-center">Predule au trône de fer</h4>
					<br>
					<ul>
						<li>Le Chevalier errant</li>
						<li>L'Epée lige</li>
						<li>L'oeuf de dragon</li>
						<li>La Princesse et la Reine, ou les Noirs et les Verts</li>
						<li>Le Prince vaurien, ou, le Frère d'un roi</li>

					<h5 >. . .  </h5>
						
					</ul>

				</div>
			</dir>
		</div>

	
		<?php include("piedpage.php"); ?>
	
		
	

</body>
</html>