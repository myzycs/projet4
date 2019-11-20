<?php
namespace Forteroche\Blog\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/AdminManager.php');

class AdminController
{
	public function adminConnexion()
	{	
		$adminManager = new \Forteroche\Blog\Model\AdminManager();
		$pseudo = $_POST['pseudo'];
       	$password=$_POST['password'];

		$authentification = $adminManager->authentification($_POST['pseudo'],$_POST['password']);

		$resultat = $authentification->fetch();

		$hashed_password = $resultat["password"];
		$isPasswordCorrect = password_verify($_POST['password'], $hashed_password);


		if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
            echo '<br />';
            echo '<a href="http://localhost/Forteroche2/blog/index.php?action=admin"> Réessayer ? </a>';
        }
        else
        {
            //si le mot de passe concorde > connexion
            if ($isPasswordCorrect) 
            {
            	//Ne fonctionne pas ???????????????????????????????????????
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $pseudo;
                
                require('View/backend/adminlog.php');
            }
            // sinon > erreur
            else 
            {
                echo 'Mauvais identifiant ou mot de passe !';
                echo '<br /><br />';
                echo '<a href="http://localhost/Forteroche2/blog/index.php?action=admin"> Réessayer mdp ? </a>';
            }
        }

    }

    public function logOut()
    {
		// On démarre la session
		session_start ();

		// On détruit les variables de notre session
		session_unset ();

		// On détruit notre session
		session_destroy ();

		// On redirige le visiteur vers la page d'accueil
		header ('location: http://localhost/Forteroche2/blog/index.php');

    }	
}


