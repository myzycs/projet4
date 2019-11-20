  <!-- Fonctionnement de la connexion de l'admin -->
<?php $title = "Administrateur"; ?>
<?php ob_start(); ?>  
    <br>
    <div id="titre">
        <h3>Bonjour !</h3>
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col text-center">
                    <p>Vous êtes connecté !</p>
                       <br /><br />
                    <a href="./articleRedact.php">Rediger un article</a>
                    
                   
                       <br /><br />

                        <a href="./interfaceAdmin.php">Acceder à l'interface administrateur</a>
                       <br /><br /><br />
                      <a href="index.php?action=logout">Déconnection</a>
              
                
            </div>
        </div>
    </div>


<?php $content =ob_get_clean(); ?>
<?php require('backendTemplate.php'); ?>