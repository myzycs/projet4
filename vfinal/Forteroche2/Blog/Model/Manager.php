<?php 
namespace Forteroche\Blog\Model;

class Manager
{	//protected pour que les fonctions filles dans les fichier manager puissent l'appeler
	protected function dbConnect()
	{
	
	    $db = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
	    return $db;
	}
}