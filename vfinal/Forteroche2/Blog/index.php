<?php
require ('Controller/PostController.php');
require ('Controller/CommentController.php');
require ('Controller/AdminController.php');

class router 
{
    public function verification(){
        $postController = new \Forteroche\Blog\Controller\PostController();
        $commentController = new \Forteroche\Blog\Controller\CommentController();
        $adminController = new \Forteroche\Blog\Controller\AdminController();


        try{//On test quelque chose
            //test du parametre action pour savoir quel controlleur appeler
            if (isset($_GET['action'])){
                //si action = listPosts alors lance la fonction listPosts
                if ($_GET['action'] == 'listPosts'){
                    $postController->listPosts();
                }
                //si action = post 
                else if ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] >0){
                       $postController->post();
                    }
                    else {
                        //Erreur > on arrete tout et on saute au catch
                        throw new Exception('Aucun identifiant de billet envoyé');
                        
                    }
                }
                else if ($_GET['action'] == 'fullList'){
                     $postController->listFullPosts();

                }
               
                else if ($_GET['action'] =='addComment') {
                    if (isset($_GET['id']) && $_GET['id'] >0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }

                        else{
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else{
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                else if ($_GET['action'] =='auteur') {
                	require('View/frontend/auteur.php');
                }

                else if ($_GET['action'] =='admin') {
                	require('View/frontend/admin.php');
                }

                else if ($_GET['action'] =='adminlog') {
                    //require('View/backend/adminlog.php');
                    $adminController->adminConnexion();
                }

                else if ($_GET['action'] =='news') {
                	require('View/frontend/news.php');
                }
                else if ($_GET['action'] =='logout') {
                    $adminController->logOut();
                }

            }
            else {
                $postController->listPosts();
            }
        }
        catch(Exeption $e) { // s'il y a une erreur ...
            echo 'Erreur :' .$e->getMessage();
        }
    }
}
$router = new Router();
$router->verification();
?>