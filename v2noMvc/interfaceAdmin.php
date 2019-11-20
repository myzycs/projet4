	<!-- INTERFACE ADMIN -->
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
			<h3>Interface administrateur</h3>
		</div>
		<div class="jumbotron">
			<div class="row">
				<div class="col">
				
					<?php
					

						if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {

						// Connexion à la base de données
						try
						{
							$objetPdo = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
						}
						catch(Exception $e)
						{
						        die('Erreur : '.$e->getMessage());
						}
						//on recupere TOUTES LES INFOS ( * ) depuis la table 'articles'
						$pdoStat = $objetPdo->prepare('SELECT * FROM articles');
						//si prepare renvoi true > on execute
						$executeIsOk= $pdoStat->execute();
						//On crée une variable $articles qui contient toutes les données recupérées
						$articles = $pdoStat->fetchAll();
						?>
						
						<h2>Menu de base</h2>
						<ul>
								<li>
									<a href="listeArticle.php">Liste des articles</a>
								</li>
								<br>
								<li>
									<a href="./articleRedact.php">Rediger un article</a>
								</li>
                        		<br>
                        		<li>
                        			<a href=commReport.php >Voir les commentaires signalés</a>
								</li>
						</ul>
						
						</div>
					</div>
				</div>
				<div class="jumbotron">
					<h2> Liste des articles :</h2>
					<ul>
						<!-- pour chaque article de la base articles on crée une variable -->
						<?php foreach ($articles as $article ):?> 
							
							<li>
								<!-- on recupere les données titre, contenu, id et published de chaque article-->
								<?php
								$id=$article['id']; 
								$titreArticle = $article['titre'];
							
								//Voir l'article
								echo '<a href=voirArticle.php?id='.$id.'>Voir l\'article : '.$id.' '.$titreArticle.' ?</a>';
								echo '<br /><br />';
								//Voir les commentaires
								echo '<a href=commArticle.php?id='.$id.'>Voir les commentaires :  ?</a>';
								echo '<br /><br />';
								//Modifier l'article
								echo '<a href=modificationDynamique.php?id='.$id.'>modifier l\'article</a>';
								echo '<br /><br />';
								//Supprimer l'article avec option confirm
								echo '<a href=http://localhost/projet4PHP/projet4/suppArticle.php?id='.$id.' onClick="return confirmation();" >supprimer l\'article</a>';
								echo '<br /><br />';
								?>
								<!-- Code de la fonction JAVASCRIPT de confirmation -->
								<script>
									function confirmation()
									{
										var x = confirm("etes vous sur de vouloir supprimer l' article ?");
										if (x==true) {
											//oui
											return true;
										}else{
											//non
											return false;
										}
									}
								</script>


								
							  	
							</li>
						<!-- fin du foreach -->	
						<?php endforeach; ?>	
					</ul>

						<?php
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