<?php

include '../controller/utilisateurC.php';
include '../model/utilisateur.php';

$usersC=new usersC();
$usersC ->supprimer($_GET["id"]);

header('Location:../dashmin-1.0.0/index.php');

?>