<?php
	include 'admin/conn.php';
$setting = mysqli_query($con,"SELECT * FROM settings where id='1'");
	$setting_f = mysqli_fetch_array($setting);
	
if (isset($_POST['envoyer'])) {
//$to = 'office@website.com';
$to = $setting_f['email'];
$subject 	= $_POST["titre"];
$name 		= $_POST["nom"];
$email 		= $_POST["email"];
/*$phone		= $_POST["phone"];*/
//$subject2	= $_POST["subject"];
$message2	= $_POST["message"];

$from 		= $_POST['email'];
 
	
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h2 style="color:#f40;">'.$subject.'</h2>';
$message .= '<table>
<tr>
<td>Nom</td><td>: '.$name.'</td>
</tr>
<tr>
<td>Email</td><td>: '.$email.'</td>
</tr>

<tr>
<td>Message</td><td>: '.$message2.'</td>
</tr>
			</table>	
				';
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
	echo "<script> alert'Message envoyé avec succès!!';
		windows.location.href='index.php'
	 </cript>";
	
   
} else{
   echo "<script> Impossible d\'envoyer le message. veillez reessayer';
		windows.location.href='contact.php'
	 </cript>";
}
}
?>