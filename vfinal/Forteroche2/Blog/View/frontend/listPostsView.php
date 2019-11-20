<?php $title = 'Liste des derniers billets';?>
<?php ob_start(); ?>
        
   

<div class="lastPosts">
    <p>Derniers billets du blog :</p>
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
                        <em>le <?= $data['date_creation_fr']; ?></em>
                    </h3>
        
                    <p>
                    <!--On affiche le contenu du billet-->
                    <?= nl2br(htmlspecialchars($data['content']));?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>
