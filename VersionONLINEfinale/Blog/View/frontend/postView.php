<?php $title = htmlspecialchars($post['title']);?>
<?php ob_start(); ?>

    <p><a href="index.php"><input type="button" value="Retour à la liste des billets"></a></p>

    <div class="news">
        <div class="jumbotron">
            <div class="row">
                <div class="col text-center">
                    <h3>
                        <?= htmlspecialchars($post['title']); ?>
                        <br>
                    </h3>
                    <em>le <?= $post['date_creation_fr']; ?></em>
                    <br><br>
                        
                    <p>
                        <!--On affiche le contenu du billet-->
                        <?= ($post['content']);?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron">
        <div class="row">
            <div class="col text-center">
                <h2>Commentaires</h2>
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                	<div>
                		<label for="author">Auteur</label><br />
                		<input type="text" id="author" name="author" required>
                	</div>
                	<div>
                		<label for="comment">Commentaire</label><br />
                		<textarea id="comment" name="comment" required></textarea>
                	</div>
                	<div>
                		<input type="submit">
                	</div>
                </form>
                <br>
    
                <?php 
                while($comment = $comments->fetch())
                {
                ?>
                    
                	<p id="commentAuthor">
                        <strong><?= htmlspecialchars($comment['author'])?></strong>
                        le <?= $comment['comment_date_fr'] ?>
                    </p>

                	<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <a href="index.php?action=report&amp;id=<?= $comment['id'] ?>">Signaler le commentaire</a>
                    <br><br><br>

                <?php	
                }
                ?>
            </div>
        </div>
    </div>
       
<?php $content = ob_get_clean(); ?>
<?php require('frontendTemplate.php'); ?>