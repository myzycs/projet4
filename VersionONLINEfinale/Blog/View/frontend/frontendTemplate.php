<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        
        <!--  Bootstrap css link -->
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet" /> 
        
    </head>
        
    <body>
    	<?php require('header.php') ?>
    	<nav class="navbar navbar-expand-sm justify-content-center sticky-top">
        <div class="container-fluid justify-content-center">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class=nav-link href="index.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class=nav-link href="index.php?action=auteur">L'auteur</a>
                </li>
                
                <li class="nav-item">
                    <a class=nav-link href="index.php?action=news"> Nouveautés</a>
                </li>
                
                <li class="nav-item">
                    <!--Creer une nouvelle page -->
                    <a class=nav-link href="index.php?action=fullList">Liste des articles</a>
                </li>

            </ul>
        </div>
        <!--Fermeture de la div pour avoir un menu centré et garder "admin" à droite -->    
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class=nav-link href="index.php?action=admin">Admin</a>
            </li>
        </ul>
        </nav>
        <?= $content ?>
        <?php require('footer.php') ?>
    </body>
</html>