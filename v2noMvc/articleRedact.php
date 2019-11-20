<!--REDACTION DE L'ARTICLE PAR L'ADMIN --> 
<?php session_start(); ?>
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
		
	</header>

		
		<br>
		<div id="titre">
			<h3>Rediger un article</h3>
		</div>

		<div class="row">
			<div class="col">

			
				<?php
			

				if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {

				?>

					<script src='https://cdn.tiny.cloud/1/oapp4sreyblg7sjsk4afbaxlukt1kjs6m8ud7tfpbwwqd0zj/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
				    <!-- option tinyMCE --> 
					<script>
					tinymce.init({
						selector: '#mytextarea'
					});
					</script>
				
				<!-- Formulaire d'envoi de l'article à la bdd par l'auteur --> 
				<form action="article.php" method="post">
				    <input type="text" name="titre" placeholder="Titre">
				    <textarea id="mytextarea" name="textarea"></textarea>
				    <br>
				    <p class="publier"><input type="checkbox" name="published" value="1" >Cocher la case pour publier ! </p>
				    <p><input type="submit" value="Envoyer" /></p>
				    
				</form>


			<div class="adminNav sticky-bottom">
				<a href="./interfaceAdmin.php">Acceder à l'interface administrateur</a>
				<br><br>
				<a href="./logout.php">Déconnection</a>
			</div>		  


				<?php 
				}else{

				  echo "Vous n'avez pas les droits";
				}

				?>
			</div>
		</div>
		
	
	
		
</body>
</html>