<?php 
namespace Blog\Model;

class Manager
{	//protected pour que les fonctions filles dans les fichier manager puissent l'appeler
	protected function dbConnect()
	{
		$version ='db5000227314.hosting-data.io';
        $dbname = 'dbs221922';
        $charset ='utf8';
        $dsn = 'mysql:host='.$version.';dbname='.$dbname.';charset='.$charset;
        $username = 'dbu448573';
        $password = '25Jean05Forteroche_';

        $db = new \PDO( $dsn, $username , $password );

        return $db;
	}
}