<!--REDACTION DE L'ARTICLE PAR L'ADMIN --> 
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
<h1>Bonjour Monsieur Forteroche !</h1>
<!-- Formulaire d'envoi de l'article à la bdd par l'auteur --> 
  <form action="article.php" method="post">
    <input type="text" name="titre">
    <textarea id="mytextarea" name="textarea"></textarea>

    <p><input type="checkbox" name="published" value="1" >Publier ?</p>
    <p><input type="submit" value="Envoyer" /></p>
    
  </form>
  <?php
  echo '<a href="./interfaceAdmin.php">Acceder à l\'interface administrateur</a>';
  echo '<br /><br />';
  echo '<a href="./logout.php">Déconnection</a>';
  ?>
</body>
</html>

<?php 
}else{

  echo "Vous n'avez pas les droits";
}

?>
