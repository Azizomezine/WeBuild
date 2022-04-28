<?php

include "../model/contact.php";
include "../controllers/contactc.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['sujet']) and isset($_POST['message']))
{

$contact1=new contact($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['sujet'],$_POST['message']);
$contact1c=new contactc();
$contact1c->ajoutercontact($contact1);

header('Location: contact.html');
	





	
	$header ="MIME-version: 1.0\r\n"; 

$header.='From : PrimFX.com"<support@primfix.com>'."\n"; 

$header.='Content-Type:text/html; charset="uft-8"'."\n"; 

$header.='Content-Transfer-Encoding: 8bit';
$to=$_POST['email'];


$message='
<html>
	<body>
			<div>
			Thank  you for contacting us; we will reach out within one business day.
			</div>
	</body>

</html>
 '; 


 mail($to, "test", $message, $header); 
 echo "email sent";

}
else{
	echo "vérifier les champs";
}


?>
