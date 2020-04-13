<?php $title = 'Liste des commentaires';?>
<?php ob_start(); ?>

<div class="lastPosts">
    <p>Commentaires de l'article :</p>
</div>
<div class="news">
	<div class="jumbotron">
	    <div class="row">
	        <div class="col text-center">
	        	<h2>Commentaires</h2>

	        	<?php
	        		//Affiche la liste des billets
					while ($data = $showArticleComms->fetch())
					{
				?>
	            	<br>
	               	<p id="commentAuthor">
	                    <strong><?= htmlspecialchars($data['author'])?></strong>
	                    le <?= $data['comment_date_fr'] ?>
	                </p>

	                <p><?= nl2br(htmlspecialchars($data['comment'])) ?></p>   
	                <br>

	    			<a href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>" onClick="return deleteConfirmation();">supprimer le commentaire ?</a>
	    			<br><br>

	            <?php
					} // Fin de la boucle des billets
					$showArticleComms->closeCursor();
				?>
	        </div>
	    </div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>
