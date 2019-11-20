  <!-- Fonctionnement de la connexion de l'admin -->
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
            <h3>Bonjour !</h3>
        </div>
        <div class="jumbotron">
            <div class="row">
                <div class="col text-center">
                  
                    <?php 
                    //variable reprennant les valeurs du formulaire
                    $pseudo = $_POST['pseudo'];
                    $password=$_POST['password'];

                    //connexion a la base de donnée
                    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
                    //Récupération de l'utilisateur et de son pass hashé via la bdd
                    $req = $bdd->prepare('SELECT id, password FROM admin WHERE pseudo = :pseudo');
                    $req ->execute(array(
                        'pseudo' => $pseudo));
                    $resultat = $req->fetch();
                    //variable du mot de passe dans la base
                    $hashed_password = $resultat["password"];

                    // Comparaison du pass envoyé via le formulaire avec la base
                    $isPasswordCorrect = password_verify($_POST['password'], $hashed_password);

                    //si le resultat entre la base de donnée et le pseudo entré en formulaire ne sont pas les memes>erreur
                    if (!$resultat)
                    {
                        
                        echo 'Mauvais identifiant ou mot de passe !';
                        echo '<br />';
                        echo '<a href="http://localhost/projet4PHP/projet4/index.php"> Réessayer ? </a>';
                    }
                    else
                    {
                        //si les mot de passe concorde > connexion
                        if ($isPasswordCorrect) {
                            session_start();
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['pseudo'] = $pseudo;
                            echo 'Vous êtes connecté !';
                            echo '<br /><br />';

                            echo '<a href="./articleRedact.php">Rediger un article</a>';
                            echo '<br /><br />';

                            echo '<a href="./interfaceAdmin.php">Acceder à l\'interface administrateur</a>';
                            echo '<br /><br /><br />';
                           
                            echo '<a href="./logout.php">Déconnection</a>';


                        }
                        // sinon > erreur
                        else {
                            echo 'Mauvais identifiant ou mot de passe !';
                            echo '<br /><br />';
                            echo '<a href="http://localhost/projet4PHP/projet4/index.php"> Réessayer ? </a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    
    
        <?php include("piedpage.php"); ?>
</body>
</html>