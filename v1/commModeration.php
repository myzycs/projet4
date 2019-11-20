<!-- PAGE MODERATION D'ARTICLE RAJOUTER UN CONFIRM -->
<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$id=$_GET['id'];


	//on prepare la requete pour supprimer un article
$req = $bdd->prepare('UPDATE `commentaires`SET report=0 WHERE id= '.$id.'');
//on execute la requete
$result = $req->execute();


header('Location: commReport.php');

}else{
	echo "Vous n'avez pas les droits";
	
}
?>