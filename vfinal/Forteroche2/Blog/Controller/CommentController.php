<?php
namespace Forteroche\Blog\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class CommentController 
{
	public function addComment($postId,$author,$comment)
	{
		$commentManager = new \Forteroche\Blog\Model\CommentManager();

		$affectedLines = $commentManager->postComment($postId,$author,$comment,$report);

		if ($affectedLines === false) {
			throw new Exception('impossible d\'ajouter le commentaire!');
		}
		else {
			header('location: index.php?action=post&id='. $postId);
		}
	}
}