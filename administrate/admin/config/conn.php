<?php
try
{
	$db_host="mysql:host=localhost;dbname=alpharomeo";
	
	$username='root';
	$password='';
  $bdd = new PDO($db_host, $username, $password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 $bdd->query('SET NAMES UTF8'); 

?>