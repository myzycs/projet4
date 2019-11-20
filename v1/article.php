<!-- RECUPERATION DE L'ARTICLE A POSTER VIA articleRedact.php -->
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
//variable du contenu de l'article
$titre = $_POST['titre'];
$contenu = $_POST['textarea'];
$publish = 0;

// si le bouton publié est coché alors la valeur est a 1
if (isset($_POST['published']) && ($_POST['published'] == '1')) {
	$publish =1;
	
	
};

//on insere les données dans la bdd
$req = $bdd->prepare('INSERT INTO articles (titre, contenu, published) VALUES(?, ?, ?)');
//on execute la requete
$result = $req->execute(array($titre, $contenu, $publish));
//on retourne directement a la liste des articles
header('Location: listeArticle.php');

}else{
	echo "Vous n'avez pas les droits";
	
}
?>