<!-- PAGE COMMENTAIRE DES ARTICLES POUR TOUS -->
<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	//verification que la variable $_GET['id'] n'est pas vide
 	if(isset($_GET['id']) AND !empty($_GET['id'])){

 		//securisation
 		$getid = htmlspecialchars($_GET['id']);

 		//on recupere les données de la table des articles
 		$article = $bdd->prepare('SELECT * FROM articles WHERE id = ?'); 
 		$article ->execute(array($getid));
 		$article = $article->fetch();

 		

 		//verification que le commentaire existe et que les champs PSEUDO et COMMENTAIRE ne sont pas vides
 		if (isset($_POST['send_comm'])){
 			if (isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire']))
 			{	
 				//Variables securisée par htmlspecialchars
 				$pseudo=htmlspecialchars($_POST['pseudo']);
 				$commentaire=htmlspecialchars($_POST['commentaire']);
 				//taille du pseudo inferieur a 25 caractere
 				if (strlen($pseudo) <25 ) {
 					//on insere dans la bdd
 					$ins = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire, id_article,date_post,report) VALUE(?,?,?,NOW(),0)');
 					$ins->execute(array($pseudo,$commentaire,$getid));
 					//message de confirmation en vert
 					$c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
 					
 				} else {
 					//message d'erreur en rouge
 					$c_msg = "<span style='color:red'>Erreur : le pseudo doit faire moins de 25 caracteres</span>";
 				}

 			} else {
 				//message d'erreur en rouge
 				$c_msg="<span style='color:red'>Erreur :Tous les champs doivent etre complétés</span>";
 			}
 		}
 		//recupere les commentaires de l'articles en fonction de l'id
 		$commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_article=? ORDER BY id DESC');
 		$commentaires->execute(array($getid));

?>
	
	<h2>Titre</h2>
	<p><?=$article['titre'] ?></p>
<!--<h2>Article:</h2>
	<p><?=$article['contenu']?></p>
-->
	<br/>
	<h2>Commentaires:</h2>

	<form  method="post" style="width: 250px;">
		<fieldset>
		<legend>Commentaire</legend><br/>
	    
		    <input type="text" name="pseudo"  placeholder="Votre pseudo" ><br />
		  	<input type="textarea" name="commentaire"  placeholder="Votre commentaire" /><br/><br/>
			<input type="submit" value="Envoyer" name="send_comm" />
		</fieldset>
		
	</form>

<!-- pour les messages d'erreur-->
<?php if (isset($c_msg)) { echo $c_msg;}?>
<br/>
<?php 
	//on affiche les commentaires de l'article
	while ($c = $commentaires->fetch()){ 
?>
	<b><?=$c['date_post']?> <?=$c['pseudo']?>:</b> <?=$c['commentaire']?> <br/>
	
<?php 
	$id=$c['id'];
	echo '<a href=signalement.php?id='.$id.';>Signaler le commentaire </a>';
	echo '<br /><br />';
?>

<?php } ?>



<?php
	 }

?>


