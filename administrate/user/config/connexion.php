<?php
$host="localhost";
$user="root";
$dbname="apharomeo";
$password="";
try{
	$bdd=mysqli_connect($host,$user,$dbname,$password);
} catch (Exception$e){
	echo "erreur:".$e->getMessage();
}



?>