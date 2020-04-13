<?php $title = 'Liste des commentaires signalés';?>
<?php ob_start(); ?>
        
<div class="lastPosts">
    <p>Liste des commentaires signalés :</p>
</div>

<?php
$data = $getNumberReportComment->fetch();
if ($data[0]>0) {
while ($data = $showReportComms->fetch())
{
?>
    <div class="news">
        <div class="jumbotron">
            <div class="row">
                <div class="col text-center">
                        
                    <p><strong>ID DE L'ARTICLE :</strong>  <?= htmlspecialchars($data['post_id']); ?></p>
                    <p><strong>PSEUDO :</strong>  <?= htmlspecialchars($data['author']); ?></p>
                    <p><strong>LE :</strong> <?= $data['comment_date']; ?></p>
                    <p> <strong>COMMENTAIRE :</strong>

                    <!--On affiche le contenu du billet-->
                    <?= (htmlspecialchars($data['comment']));?>

                    <br>
                    <a href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>" onClick="return deleteConfirmation();">supprimer le commentaire ?</a>
                     <br />
                    <a href="index.php?action=moderateComment&amp;id=<?= $data['id'] ?>" onClick="return moderateConfirmation();" >moderer le commentaire ?</a>

                    </p>
                </div>
            </div>
        </div>
    </div>

<?php
} // Fin de la boucle des billets
}else{
        echo '<div class="lastPosts"><p>Aucun commentaire signalé</p></div>';
    } 
$showReportComms->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>
