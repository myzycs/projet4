<!-- Connexion pour l'admin -->	
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
			<h3>Cette section est reservé aux administrateurs</h3>
		</div>
		<div class="admin">
		<div class="jumbotron">
			<div class="row">
				<div class="col text-center">

					
					<form method="post" action="adminlog.php" style="width: 250px;">
						
						<legend>Connexion</legend>
						<p>
							<label for="pseudo">Pseudo :</label><input  type="text" name="pseudo" id="pseudo" /><br />
							<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
						</p>
						
						<p><input type="submit" value="Connexion" /></p>
					</form>

				</div>
			</div>
		</div>
		</div>
	
	
		<?php include("piedpage.php"); ?>
</body>
</html>