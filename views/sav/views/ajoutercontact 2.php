<?php

include "../model/contact.php";
include "../controllers/contactc.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['sujet']) and isset($_POST['message']))
{

$contact1=new contact($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['sujet'],$_POST['message']);
$contact1c=new contactc();
$contact1c->ajoutercontact($contact1);

header('Location: contact.html');
	
}
else{
	echo "vérifier les champs";
}

?>
