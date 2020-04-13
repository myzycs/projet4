<?php $title = htmlspecialchars($post['title']);?>
<?php ob_start(); ?>

<div class="lastPosts">
    <p>Modifier : <?= htmlspecialchars($post['title']); ?>:</p>
</div>
   
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
                        
                    <!--On affiche le contenu du billet-->
                    <?= htmlspecialchars($post['content']);
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

        <?php
            $content = $post['content'];
        ?> 
        <!-- Formulaire de modification de l'article par l'auteur --> 
        <form action="index.php?action=editArticle&amp;id=<?= $post['id'] ?>" method="post">
            <input type="text" name="title" value="<?= $post['title']?>" required>

            <textarea id="mytextarea" name="articleContent"><?=$content?></textarea>

            <p class="publier"><input type="checkbox" name="published" value="1" checked>Cocher la case pour publier ! </p>
            <!--echo '<input type="hidden" name="id" value="' +$_GET['ID'] +'">' -->
            <p><input type="submit" value="Envoyer" /></p>
            
        </form>
       
<?php $content = ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>