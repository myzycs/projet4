  <!-- Fonctionnement de la connexion de l'admin -->
<?php $title = "Interface administrateur"; ?>
<?php ob_start(); ?>  
    <br>
    <div id="titre">
        <h3>Interface administrateur !</h3>
    </div>

    <div class="jumbotron">
        <div class="row">
            <div class="col text-center">

                <a href="index.php?action=newArticle">Rediger un article</a>
                <br /><br />
                <a href="index.php?action=notPublishList">Articles non publiés</a>
                <br /><br />
                <a href="index.php?action=PublishList">Articles publiés</a>
                <br /><br />
                <a href="index.php?action=showReport">Modération des commentaires</a>
                <br /><br />
                <a href="index.php">Retour a l'accueil</a>
                <br /><br />
                <a href="index.php?action=logout">Déconnexion</a>

            </div>
        </div>
    </div>

<?php $content =ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>