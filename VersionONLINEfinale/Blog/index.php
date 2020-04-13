<?php
session_start();
//test
require ('Controller/PostController.php');
require ('Controller/CommentController.php');
require ('Controller/AdminController.php');

class router 
{
    public function verification(){
        $postController = new \Blog\Controller\PostController();
        $commentController = new \Blog\Controller\CommentController();
        $adminController = new \Blog\Controller\AdminController();


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

                else if ($_GET['action'] =='report') {
                    $commentController->reportComment();
                }

                //Barre de navigation
                else if ($_GET['action'] =='auteur') {
                	require('View/frontend/auteur.php');
                }

                else if ($_GET['action'] =='news') {
                    require('View/frontend/news.php');
                }

                else if ($_GET['action'] =='admin') {
                    //Ne pas avoir à se relog
                    if (isset($_SESSION['pseudo'])){
                        require('View/backend/adminInterface.php');
                    }
                    else 
                    {
                	require('View/frontend/admin.php');
                    }
                }

                else if ($_GET['action'] =='adminlog') {
                    $adminController->adminConnexion();
                }

                //Partie Administrateur
                else if ($_GET['action'] =='logout') {
                    $adminController->logOut();
                }

                else if ($_GET['action'] =='newArticle') {
                    //Verification de l'authentification
                    if (isset($_SESSION['pseudo'])){
                        require('View/backend/articleRedaction.php');
                    }
                    else
                    {
                        require('View/frontend/admin.php');
                    } 
                }

                else if ($_GET['action'] =='addArticle') {
                    if (isset($_SESSION['pseudo'])){
                        if (!empty($_POST['title']) && !empty($_POST['articleContent'])) {
                        $adminController->addArticle($_POST['title'],$_POST['articleContent'],0);
                    
                        }else
                        {
                        throw new Exception('Tous les champs ne sont pas remplis !'); 
                        }
                    }
                }

                else if ($_GET['action'] =='interface') { 
                    if (isset($_SESSION['id'])) {
                        require('View/backend/adminInterface.php');
                    }
                    else{
                        require('View/frontend/admin.php');
                    } 
                }

                else if ($_GET['action'] =='notPublishList') {
                    if (isset($_SESSION['pseudo'])){
                        $adminController->listNotPublishPosts();
                    }
                }

                else if ($_GET['action'] =='PublishList') { 
                    if (isset($_SESSION['pseudo'])){
                        $adminController->listPublishPosts();
                    }
                }

                else if ($_GET['action'] =='showArticle') {
                    if (isset($_SESSION['pseudo'])){
                        $adminController->getArticleToEdit();
                    }
                }
                
                else if ($_GET['action'] =='showArticleComments') {
                    if (isset($_SESSION['pseudo'])){
                    	if (isset($_GET['id']) && $_GET['id'] >0){
                        	$adminController->showArticleComments();
                    	}else {
                            throw new Exception('Erreur');
                        }    
                    }
                }
               
                else if ($_GET['action'] =='editArticle') {
                    if (isset($_SESSION['pseudo'])){ 
                        if (!empty($_POST['title']) && !empty($_POST['articleContent'])) {
                        $adminController->editArticle($_POST['title'],$_POST['articleContent'],0);
                        require('View/backend/adminInterface.php');
                        }
                        else{
                            throw new Exception('Tous les champs ne sont pas remplis !'); 
                        }
                    }    
                }

                else if ($_GET['action'] =='showReport') { 
                    if (isset($_SESSION['pseudo'])){
                        $adminController->showReportComments();
                    }
                }
                
                else if ($_GET['action'] =='deleteComment') {
                    if (isset($_SESSION['pseudo'])){
                        $adminController->deleteComment($_GET['id']);
                        header ('Location: index.php?action=showReport');
                    }     
                }

                else if ($_GET['action'] =='deleteArticle') {
                    if (isset($_SESSION['pseudo'])){
                        $adminController->deleteArticle($_GET['id']);
                        require('View/backend/adminInterface.php');
                    }
                }

                 else if ($_GET['action'] =='moderateComment') {
                    if (isset($_SESSION['pseudo'])){
                        $adminController->moderateComment($_GET['id']);
                        header ('Location: index.php?action=showReport');
                    }    
                }

            }else{
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