<?php $title = 'Liste des articles publiés';?>
<?php ob_start(); ?>
        
<div class="lastPosts">
    <p>Articles publiés :</p>
</div>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <div class="jumbotron">
            <div class="row">
                <div class="col text-center">
                    <h3>
                        <?= htmlspecialchars($data['title']); ?>
                        <br>
                    </h3>
                        <em>le <?= $data['date_creation_fr']; ?></em>
                    <br><br>
        
                    <p>
                    <!--On affiche le contenu du billet-->
                    <?= ($data['content']);?>
                    <br />
                    </p>
                    <em><a href="index.php?action=showArticle&amp;id=<?= $data['id'] ?>">Modifier l'article</a></em>
                    <br>
                    <em><a href="index.php?action=deleteArticle&amp;id=<?= $data['id'] ?>" onClick="return deleteConfirmation();" >Supprimer l'article</a></em>
                    <br>
                    <em><a href="index.php?action=showArticleComments&amp;id=<?= $data['id'] ?>">Voir les commentaires</a></em>

                </div>
            </div>
        </div>
    </div>

<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>
