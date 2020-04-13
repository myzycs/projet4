<?php 
namespace Blog\Model;

require_once('Model/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postID)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id,author,comment,DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr ,report FROM comments WHERE post_id=? ORDER BY comment_date DESC');
		$comments->execute(array($postID));

		return $comments;
	}

	public function postComment($postId,$author,$comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, report) VALUES (?,?,?,NOW(),0)');
		$affectedLines = $comments->execute(array($postId,$author,$comment));

		return $affectedLines;
	}

	public function report($commentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET report= 1 WHERE id = ?');
		$result = $req->execute(array($commentId));

		return $result;
	}
}