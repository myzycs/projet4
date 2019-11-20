<!-- PAGE DE MODIFICATION D'ARTICLE VIA l'ID RAJOUTER UNE VERIFICATION DE CONTENU DANS LES CHAMPS TITRE ET CONTENU-->
<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <script src='https://cdn.tiny.cloud/1/oapp4sreyblg7sjsk4afbaxlukt1kjs6m8ud7tfpbwwqd0zj/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <!-- option tinyMCE --> 
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</head>

<body>

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
    $id=$_GET['id'];
   //on recupere les infos via la base de donnée
	$reponse = $bdd->query('SELECT * FROM articles WHERE id= '.$id.''); 


	//on affiche grace a une boucle while les données de la bdd
	while($donnees = $reponse->fetch())
	{
		//données de la table
		echo '<form action="modification.php?id='.$id.'" method="post">';
		echo 'titre : '; 
		echo $donnees['titre'];
		echo '<br /><br />';
		
		echo '<input type="textarea" name="titre" placeholder="'.$donnees['titre'].'">';

		echo '<br /><br />';

		echo 'id : ';
		echo $donnees['id'];

		echo '<br /><br />';
		
		echo 'contenu : ';

		echo '<br /><br />';

		echo '<textarea id="mytextarea" name="textarea" cols="80" rows="10">';
		echo $donnees['contenu'];

		echo '<br /><br />';

		echo "</textarea>";
		echo '<p><input type="checkbox" name="published" value="1" >Publier ?</p>';
		echo '<p><input type="submit" value="modifier" /></p>';
		
		echo '<br /><br /><br />';
	
		
		
	
	}
  ?>
  
</body>
</html>
<?php 
}else{

  echo "Vous n'avez pas les droits";
}

?>