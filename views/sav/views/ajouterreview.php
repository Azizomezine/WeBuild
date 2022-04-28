<?php

include "../model/review.php";
include "../controllers/reviewc.php";

if (isset($_POST['nom']) and isset($_POST['email']) and isset($_POST['review']) and isset($_POST['rating']) )
{

$rev1=new review($_POST['nom'],$_POST['email'],$_POST['review'],$_POST['rating']);
$rev1c=new reviewc();
$rev1c->ajouterreview($rev1);

header('Location: product.php');
	
}
else{
	echo "vérifier les champs";
}

?>
