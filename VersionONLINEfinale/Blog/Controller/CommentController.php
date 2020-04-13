<?php
namespace Blog\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class CommentController 
{
	public function addComment($postId,$author,$comment)
	{
		$commentManager = new \Blog\Model\CommentManager();

		$affectedLines = $commentManager->postComment($postId,$author,$comment,$report);

		if ($affectedLines === false) {
			throw new Exception('impossible d\'ajouter le commentaire!');
		}
		else {
			header('location: index.php?action=post&id='. $postId);
		}
	}

	public function reportComment()
	{
		$commentManager = new \Blog\Model\CommentManager();
		$report = $commentManager->report($_GET['id']);

		header('location: index.php');
	}
}