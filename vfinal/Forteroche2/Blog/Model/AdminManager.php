<?php 
namespace Forteroche\Blog\Model;

require_once('Model/Manager.php');

class AdminManager extends Manager
{
	public function authentification($pseudo,$password)
	{
		
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, password FROM admin WHERE pseudo = :pseudo');
        $req ->execute(array('pseudo' => $pseudo));
        
        return $req;
	}

	
}