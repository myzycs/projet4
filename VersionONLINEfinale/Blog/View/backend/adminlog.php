  <!-- Fonctionnement de la connexion de l'admin -->
<?php $title = "Administrateur"; ?>
<?php ob_start(); ?>  
    <br>
    <div id="titre">
        <h3>Bonjour !</h3>
        <h3>Vous êtes connecté !</h3>
    </div>
    <div class="jumbotron">
        <div class="col text-center">

            <br /><br />
            <a href="index.php?action=newArticle">Rediger un article</a>
            <br /><br />
            <a href="index.php?action=interface">Acceder à l'interface administrateur</a>
            <br /><br /><br />
            <a href="index.php?action=logout">Déconnection</a>

        </div>
    </div>    
 
<?php $content =ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>