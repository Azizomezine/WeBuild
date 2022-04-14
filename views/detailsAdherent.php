<?php

include '../controller/adherentC.php';
include '../model/adherent.php';

$adherentC=new adherentC();

$adherent =$adherentC->details($_POST['NumAbon']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adherent</title>
</head>
<body>
    <h1>Details Adherent</h1>
    <ul>
     <li><?php echo $adherent ['NumAbon'];?></li>
     <li><?php echo $adherent ['Nom'];?></li>
     <li><?php echo $adherent ['Email'];?></li>
     <li><?php echo $adherent ['Prenom'];?></li>
     <li><?php echo $adherent ['Adresse'];?></li>
     <li><?php echo $adherent ['DateInscription'];?></li>
     </ul>
</body>