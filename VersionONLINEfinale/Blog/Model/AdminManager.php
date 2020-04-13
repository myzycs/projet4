<?php 
namespace Blog\Model;

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

	public function createArticle($title,$content,$publish)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts (title, content, published, creation_date) VALUES(?, ?, ?,NOW())');
		$result = $req->execute(array($title, $content, $publish));

		return $req;
	}

	
	public function editArticle($title,$content,$publish, $id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title= ? , content= ?, published= ? WHERE id = ? ');
		$result = $req->execute(array($title,$content,$publish,$id));

		return $result;
	}



	public function getNotPublishPosts()
	{
		$db = $this->dbConnect();
		// On récupère les 5 derniers billets
		$req = $db->query('SELECT id, title, content,published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE published = 0 ORDER BY creation_date');

		return $req;
	}

	public function getNumberNonPublishedArticle()
	{
		$db = $this->dbConnect();
		// On récupère les 5 derniers billets
		$req = $db->query('SELECT COUNT(*) FROM posts WHERE published=0');

		return $req;
	}

	public function getPublishPosts()
	{
		$db = $this->dbConnect();
		// On récupère les 5 derniers billets
		$req = $db->query('SELECT id, title, content,published, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE published = 1 ORDER BY creation_date');

		return $req;
	}

	public function getArticleToEdit($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id,title,content,published,DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function showReportComment()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM comments WHERE report = 1');
		
		return $req;
	}

	public function getNumberReportComment()
	{
		$db = $this->dbConnect();
		// On récupère les 5 derniers billets
		$req = $db->query('SELECT COUNT(*) FROM comments WHERE report = 1');

		return $req;
	}

	public function deleteComment($postId) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id= ?');
		$result = $req->execute(array($postId));

		return $result;
	}

	public function moderateComment($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET report= "0" WHERE id =?');
		$result = $req->execute(array($postId));

		return $result;
	}

	public function deleteArticle($postId) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id=?');
		$result = $req->execute(array($postId));
		
		return $result;
	}
	
	public function showArticleComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id,author,comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr ,report FROM comments WHERE post_id=? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}
}