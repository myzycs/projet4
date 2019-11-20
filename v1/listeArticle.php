<!-- LA LISTE DES ARTICLES POUR TOUS -->
<?php

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

  <h1> Liste des articles</h1>


<ul>
	<!-- pour chaque article de la base articles on crée une variable -->
	<?php foreach ($articles as $article ):?> 
		
		<li>
			<!-- on recupere les données titre, contenu, id et published de chaque article-->
			<?php
			$id=$article['id']; 
			$titreArticle = $article['titre'];
			echo 'titre : '; 
			echo $article['titre'];
			echo '<br /><br />';
			
			echo 'contenu : '; 
			echo $article['contenu'];
			echo '<br /><br />';

			echo '<a href=voirArticle.php?id='.$id.'>Voir l\'article : '.$id.' '.$titreArticle.' ?</a>';
			echo '<br /><br />';

			echo '<a href=commArticle.php?id='.$id.'>Voir les commentaires : '.$id.' '.$titreArticle.' ?</a>';
			echo '<br /><br />';
			
			?>
		  	
		  	
		</li>
		
	<!-- fin du foreach -->	
	<?php endforeach; ?>	
</ul>

	<?php
	echo '<a href="./interfaceAdmin.php">Acceder à l\'interface administrateur</a>';
	echo '<br /><br />';
	echo '<a href="./logout.php">Déconnection</a>';
	?>

</body>
</html>
