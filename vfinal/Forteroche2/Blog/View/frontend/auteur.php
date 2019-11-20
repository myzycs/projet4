<!-- Page de presentation de l'auteur -->
<?php $title = "Auteur"; ?>
<?php ob_start(); ?>	
	
		
		<br>
		<div id="titre">
			<h3>L'auteur</h3>
		</div>
		
		<div class="jumbotron">
			<div class="row">
				<div class="col text-center">
					<img class="img-fluid" src="public/images/george.jpg">
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

	
		
<?php $content =ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>
		
	
