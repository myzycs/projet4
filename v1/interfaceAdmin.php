<!-- INTERFACE ADMIN -->
<?php
session_start();

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
	<!DOCTYPE html>
<html>
<head>

</head>

<body>
	<h1>Interface administrateur</h1>
	<h2>Vu d'ensemble des articles</h2>
	<ul>
		<li>
			<a href="listeArticle.php">Liste des articles</a>
		</li>
	</ul>
	
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

	<h2>Commentaires signalés :</h2>
	<ul>
		<li>
			<?php

				echo '<a href=commReport.php >Voir les commentaires signalés</a>';
				echo '<br /><br />';

			?>
			
		</li>
	</ul>
	<?php
	echo '<a href="./logout.php">Déconnection</a>';
	?>

</body>
</html>

<?php
}else{
	echo "Vous n'avez pas les droits";
	
}
?>


