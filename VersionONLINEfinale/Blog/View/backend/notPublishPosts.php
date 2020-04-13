<?php $title = 'Liste des articles non publiés';?>
<?php ob_start(); ?>
        
<div class="lastPosts">
    <p>Articles non publiés :</p>
</div>

<?php
    $data = $nbPosts->fetch();
   
    if ($data[0]>0) {
        while ($data = $posts->fetch())
        {
?>
        <div class="news">
            <div class="jumbotron">
                <div class="row">
                    <div class="col text-center">

                        <h3>
                            <?= htmlspecialchars($data['title']); ?>
                        </h3>
                        <em>
                            le <?= $data['date_creation_fr']; ?>
                        </em>
                        
                        <p>
                            <!--On affiche le contenu du billet-->
                            <?= ($data['content']);?>
                            <br/>

                            <em>
                                <a href="index.php?action=showArticle&amp;id=<?= $data['id'] ?>">Modifier l'article</a>
                            </em>
                            <br>

                            <em>
                                <a href="index.php?action=deleteArticle&amp;id=<?= $data['id'] ?>" onClick="return deleteConfirmation();" >Supprimer l'article</a>
                            </em>  
                        </p>

                    </div>
                </div>
            </div>
        </div>

    <?php
        } // Fin de la boucle des billets
    }else{
        echo '<div class="lastPosts"><p>Tous les articles sont publiés</p></div>';
    } 
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>
