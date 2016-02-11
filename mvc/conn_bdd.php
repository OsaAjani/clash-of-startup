<?php
	//CETTE PAGE GERE LA CONNEXION A LA BASE DE DONNEES
	$host = 'localhost';
	$dbname = 'clash_of_startup';
	$user = 'root';
	$password = 'root';

	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password, array(PDO::ATTR_PERSISTENT => TRUE));
		$bdd->exec("SET CHARACTER SET utf8");
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
?>
