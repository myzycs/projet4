<!-- Connexion pour l'admin -->	
<?php $title = "Admin"; ?>
<?php ob_start(); ?>	
		<br>
		<div id="titre">
			<h3>Cette section est reservé aux administrateurs</h3>
		</div>
		<div class="admin">
		<div class="jumbotron">
			<div class="row">
				<div class="col text-center">

					<form method="post" action="index.php?action=adminlog" style="width: 250px;">
						
						<legend>Connexion</legend>
						<p>
							<label for="pseudo">Pseudo :</label><br><input  type="text" name="pseudo" id="pseudo" /><br />
							<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
						</p>
						
						<p><input type="submit" value="Connexion" /></p>
					</form>
					
				</div>
			</div>
		</div>
		</div>
	
	
		

<?php $content =ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>