<!-- CREATION ACCOUNT ADMIN -->
<?php
try
{	//connexion a la base
	$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
//variables qui reprenne les valeurs du formulaires
$pseudo = 'JeanForteroche';
$password = 'Azerty' ;

//variable qui "hash" le mdp 
$mdp= password_hash( $password , PASSWORD_DEFAULT);


//variables qui recupere et enregistre dans la table
$query = "INSERT INTO admin VALUES (id,'".$pseudo."','".$mdp."')";
$statement = $bdd->prepare($query);
$statement->execute();

echo "membre ajouté avec succes";


?>