  <!-- Fonctionnement de la connexion de l'admin -->
<?php $title = "Creer un nouvel article"; ?>
<?php ob_start(); ?>  
    <br>
    <div id="titre">
        <h3>Redaction d'un nouvel article !</h3>
    </div>
        
    <!-- Formulaire d'envoi de l'article à la bdd par l'auteur --> 
    <form action="index.php?action=addArticle" method="post">
        <input type="text" name="title" placeholder="Title" required >
        <textarea id="mytextarea" name="articleContent" required ></textarea>
        <br>
        <p class="publier"><input type="checkbox" name="published" value="1" checked>Publier l'article ! </p>
        <p><input type="submit" value="Envoyer" /></p>
        
    </form>
    
<?php $content =ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>