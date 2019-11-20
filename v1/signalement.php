<!-- PAGE DE SIGNALEMENT DE COMMENTAIRE-->
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$id=$_GET['id'];
$req = $bdd->prepare('UPDATE commentaires SET report= "1" WHERE id = '.$id.'');
$result = $req->execute(array());
header('Location: listeArticle.php');
?>