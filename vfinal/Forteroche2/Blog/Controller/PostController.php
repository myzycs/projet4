<?php
namespace Forteroche\Blog\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class PostController 
{

	public function listPosts()
	{
		$postManager = new \Forteroche\Blog\Model\PostManager(); //Creation d'un objet
		$posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

		require('View/frontend/listPostsView.php');
	}

	public function listFullPosts()
	{
		$postManager = new \Forteroche\Blog\Model\PostManager(); //Creation d'un objet
		$posts = $postManager->getFullPosts(); // Appel d'une fonction de cet objet

		require('View/frontend/fullList.php');
	}

	public function post()
	{
		$postManager = new \Forteroche\Blog\Model\PostManager();
		$commentManager = new \Forteroche\Blog\Model\CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require('View/frontend/postView.php');
	}
}