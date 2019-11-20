 <!-- LA LISTE DES ARTICLES POUR TOUS -->
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Projet 4 PHP</title>
  <link rel="stylesheet" href="style.css">
  <!--  Bootstrap css link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="script.js"></script>
  
</head>

<body>
  <header>
    <?php include("header.php");?>
  </header>

    <?php include("nav.php"); ?>
    <br>
    <div id="titre">
      <h3>Liste des articles</h3>
    </div>
          <?php
          // Connexion to database
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
         
          <ul>
          <!-- pour chaque article de la base articles on crée une variable -->
          <?php foreach ($articles as $article ):?> 
            <div class="jumbotron">
             <div class="row">
            <div class="col text-center">    
              <li>
              <!-- on recupere les données de chaque article-->
                  <?php
                  $id=$article['id']; 
                  $titreArticle = $article['titre'];
                  //Constante french time
                  setlocale(LC_TIME,'fr');
                  $date=$article['date_time_publication'];

                  echo $article['titre'];
                  echo '<br /><br />';

                  echo $article['contenu'];
                  echo '<br /><br />';

                  echo '<a href=voirArticle.php?id='.$id.'>Voir l\'article?</a>';
                  echo '<br /><br />';

                  echo "publié le ";
                  echo $date;
                  echo '<br /><br />';
                  ?>
                    
                    
              </li>
            </div> 
            </div>
            </div>
          <!-- fin du foreach --> 
          <?php endforeach; ?>  
          </ul>
           
    <?php include("piedpage.php"); ?>
</body>
</html>