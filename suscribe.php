<?php

ob_start();


    include "admin/conn.php";

    //fetch settings
  $setting = mysqli_query($con,"SELECT * FROM settings where id='1'");
	$setting_f = mysqli_fetch_array($setting);



// news letters script


$to = $setting_f['email']; // Your Brand Mail ID
$from = $_POST["mail"]; // Replace it with your From Mail ID

$headers = "From: " . $from . "rn";

$subject = "Nouvel abonnement";
$body = "Nouvel utilisateur: " . $_POST['mail'];
if( filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) )
{
if (mail($to, $subject, $body, $headers, "-f " . $from))
{
echo 'Votre adresse mail (' . $_POST['mail'] . ') a été ajouté dand la liste d\'abonnés';
echo  header("Location: index.php");
}
else
{
echo 'échec, votre mail a rencontré un problème!! (' . $_POST['mail'] . ')';
}
}

ob_end_flush();
?>