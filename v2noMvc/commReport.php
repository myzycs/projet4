	<!--AFFICHE TOUS LES COMMENTAIRES QUI ONT ETE SIGNALES  -->
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
		<?php include("header.php");?>
	</header>

		<?php include("nav.php"); ?>
		<br>
		<div id="titre">
			<h3>Commentaires signalés </h3>
		</div>
		<div class="jumbotron">
			<div class="row">
				<div class="col text-center">
						<?php
						
						if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
						?>
						
						  <?php
						    try
						    {
						      $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
						      //echo 'connexion reussie';
						      //echo '<br />';
						    }

						    catch(Exception $e)
						    {
						      die('Erreur : '.$e->getMessage());
						    }
						   //on recupere les infos via la base de donnée
							$reponse = $bdd->query('SELECT * FROM commentaires WHERE report=1');


							//on affiche grace a une boucle while les données de la bdd
							while($donnees = $reponse->fetch())
							{
									$commId=$donnees['id']; 
									$commContenu = $donnees['commentaire'];

									echo 'id de l\'article : '; 
									echo $donnees['id_article']; 
									echo '<br /><br />';

									echo 'id du commentaire : '; 
									echo $donnees['id']; 
									echo '<br /><br />';

									echo 'pseudo : '; 
									echo $donnees['pseudo'];
									echo '<br /><br />';
									
									echo 'contenu : '; 
									echo $donnees['commentaire'];
									echo '<br /><br />';

									//Annule et remet "report" à 0
									echo '<a href=commModeration.php?id='.$donnees['id'].'>Annulé le signalement?</a>';
									echo '<br /><br />';

									//supprime le commentaire avec option confirm
									echo '<a href=http://localhost/projet4PHP/projet4/suppComment.php?id='.$donnees['id'].' onClick="return confirmation();">Supprimer commentaire ?</a>';
									?>
									<!-- Code de la fonction JAVASCRIPT de confirmation -->
									<script>
										function confirmation()
										{
											var x = confirm("etes vous sur de vouloir supprimer le commentaire ?");
											if (x==true) {
												//oui
												return true;
											}else{
												//non
												return false;
											}
										}
									</script>
									<?php 
									echo '<br /><br />';
									echo '<br /><br />';
									echo '<br /><br />';

							}

						  ?>
						  <?php
						  	echo '<a href="./interfaceAdmin.php">Acceder à l\'interface administrateur</a>';
						  	echo '<br /><br />';
							echo '<a href="./logout.php">Déconnection</a>';
							?>
						  
						

						<?php 
						}else{
							echo "Vous n'avez pas les droits";
							
						}
						?>
				</div>
				
				
			</div>
		</div>
	
	
		<?php include("piedpage.php"); ?>
</body>
</html>