<?php $title = 'Liste des billets';?>
<?php ob_start(); ?>
        
<br>
<div id="titre">
    <h3>Tous les articles :</h3>
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
                    </h3>

                    <em>le <?= $data['date_creation_fr']; ?></em>

                    <br><br>
        
                    <p>
                    <!--On affiche le contenu du billet-->
                    <?= ($data['content']);?>
                    <br><br>
                    </p>
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                    
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
