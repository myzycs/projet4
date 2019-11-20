<!--  MODIFICATION DE L'ARTICLE VIA modificationDynamique.php RAJOUTER UNE VERIFICATION DE CONTENU DANS LES CHAMPS TITRE ET CONTENU-->
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
	$id=$_GET['id'];
	//on insere les données dans la bdd                                                    
	$req = $bdd->prepare('UPDATE articles SET titre= "'.$titre.'", contenu="'.$contenu.'" WHERE id = '.$id.'');
	//on execute la requete
	$result = $req->execute(array($titre, $contenu, $publish));

header('Location: listeArticle.php');


}else{

  echo "Vous n'avez pas les droits";
}

?>