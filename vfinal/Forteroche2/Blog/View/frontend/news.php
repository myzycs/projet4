<!-- Page de presentation de l'auteur -->
<?php $title = "Nouveautés"; ?>
<?php ob_start(); ?>	
	
		
<br>
<div id="titre">
	<h3>Nouveautés</h3>
</div>
		
<div class="jumbotron">
	<div class="row">
		
		<div class="col">
			<p><b> Séance de dédicasse : </b></p>
			<p> 19 et 20 octobre 2019 - Mulhouse Rencontre et dédicaces au Festival Sans Nom (10 place de la Bourse) </p>
			<p> 15 novembre 2019 - BandolRencontre et dédicaces</p>
			<p>16 et 17 novembre 2019 - Toulon Rencontre et dédicaces au Festival du Livre  </p>
			<p>20 au 25 novembre 2019 - Montréal Rencontre et dédicaces au Salon du Livre</p>
		</div>
	</div>
</div>

	
		
<?php $content =ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>
		
	
