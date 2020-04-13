<!-- Connexion pour l'admin -->	
<?php $title = "Admin"; ?>
<?php ob_start(); ?>	
		<br>
		<div id="AdminTitre">
			<h3>Cette section est reservé aux administrateurs</h3>
		
			<h3>
		<?php 
			if (isset($_SESSION['erreur'])){
				echo $_SESSION['erreur'];
				//Vide l'erreur une fois affichée pour ne pas l'afficher à nouveau
				unset($_SESSION['erreur']);
			}
		?>
			</h3>
		</div>

		<div class="admin">
		<div class="jumbotron">
				<div class="col text-center">
					<form method="post" action="index.php?action=adminlog">

						<legend>Connexion</legend>
						<p>
							<label for="pseudo">Pseudo :</label>
							<br>
							<input  type="text" name="pseudo" id="pseudo" />
							<br />
							<label for="password">Mot de Passe :</label>
							<br>
							<input type="password" name="password" id="password" />
							<br />
						</p>
						
						<p><input type="submit" value="Connexion" /></p>
					</form>
				</div>
		</div>
		</div>
	
<?php $content =ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>