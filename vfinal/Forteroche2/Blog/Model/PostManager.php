<?php 
namespace Forteroche\Blog\Model;

require_once('Model/Manager.php');

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		// On récupère les 5 derniers billets
		$req = $db->query('SELECT id, title, content,published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

		return $req;
	}


	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id,title,content,published,DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function getFullPosts()
	{
		$db = $this->dbConnect();
		// On récupère tous les billets
		$req = $db->query('SELECT id, title, content,published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date');

		return $req;
	}
}