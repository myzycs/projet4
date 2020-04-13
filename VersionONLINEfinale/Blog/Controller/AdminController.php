<?php
namespace Blog\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/AdminManager.php');

class AdminController
{
	public function adminConnexion()
	{	
        
		$adminManager = new \Blog\Model\AdminManager();
        //variable de session
		$pseudo = $_POST['pseudo'];
       	$password = $_POST['password'];

		$authentification = $adminManager->authentification($pseudo,$password);

		$resultat = $authentification->fetch();

		$hashed_password = $resultat["password"];
		$isPasswordCorrect = password_verify($_POST['password'], $hashed_password);


		if (!$resultat)
        {   
            //variable a affiché en cas de mauvais mot de passe
            $_SESSION['erreur'] = 'Mot de passe incorrect';
            require('View/frontend/admin.php');
        }
        else
        {
            //si le mot de passe concorde > connexion
            if ($isPasswordCorrect) 
            {
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;
                require('View/backend/adminlog.php');

            }
            // sinon > erreur
            else 
            {   
                //variable a affiché en cas de mauvais mot de passe
                $_SESSION['erreur'] = 'Mot de passe incorrect';
                require('View/frontend/admin.php');
            }
        }
    }

    public function logOut()
    {
		// On détruit les variables de notre session
		session_unset ();
		// On détruit notre session
		session_destroy ();
		// On redirige le visiteur vers la page d'accueil
        header ('Location: index.php');
    }	

    public function addArticle($title,$content,$publish)
    {
        $adminManager = new \Blog\Model\AdminManager();
        //variable du contenu de l'article
        $title = $_POST['title'];
        $content = $_POST['articleContent'];
        $publish = 0;

        // si le bouton publié est coché alors la valeur est a 1
        if (isset($_POST['published']) && ($_POST['published'] == '1')) {
        $publish =1;
        }

        $createArticle = $adminManager->createArticle($title,$content,$publish);
        require('View/backend/adminInterface.php');
    }


    public function editArticle($title,$content,$publish)
    {
        $adminManager = new \Blog\Model\AdminManager();
        $title = $_POST['title'];
        $content = $_POST['articleContent'];
        $publish = 0;
        $id = $_GET['id'];
        // si le bouton publié est coché alors la valeur est a 1
        if (isset($_POST['published']) && ($_POST['published'] == '1')) {
        $publish =1;
        }

        $editArticle = $adminManager->editArticle($title,$content,$publish,$id);
    }

    public function listNotPublishPosts()
    {
        $adminManager = new \Blog\Model\AdminManager();
        $posts = $adminManager->getNotPublishPosts();
        $nbPosts = $adminManager->getNumberNonPublishedArticle();
        
        require('View/backend/notPublishPosts.php');
    }


    public function listPublishPosts()
    {
        $adminManager = new \Blog\Model\AdminManager();
        $posts = $adminManager->getPublishPosts();

        require('View/backend/publishPosts.php');
    }

    public function getArticleToEdit()
    {
        $adminManager = new \Blog\Model\AdminManager();
        $post = $adminManager->getArticleToEdit($_GET['id']);

        require('View/backend/editArticle.php');
    }
    
    public function showReportComments()
    {
        $adminManager = new \Blog\Model\AdminManager();
        $showReportComms = $adminManager->showReportComment();
        $getNumberReportComment =$adminManager->getNumberReportComment();

        require('View/backend/listCommentsReported.php');
    }

    public function showArticleComments()
    {
        $adminManager = new \Blog\Model\AdminManager();
        $showArticleComms = $adminManager->showArticleComments($_GET['id']);

        require('View/backend/adminPostView.php');
    }
    
    public function deleteComment() 
    {
        $adminManager = new \Blog\Model\AdminManager();
        $deleteComm = $adminManager->deleteComment($_GET['id']);
    }

    public function moderateComment() 
    {
        $adminManager = new \Blog\Model\AdminManager();
        $moderateComm = $adminManager->moderateComment($_GET['id']);
    }

     public function deleteArticle() 
    {
        $adminManager = new \Blog\Model\AdminManager();
        $delete = $adminManager->deleteArticle($_GET['id']);
    }
}

