<?php

include '../controller/roleC.php';
include '../model/role.php';

$roleC=new roleC();
$roleC ->supprimer($_GET["idRole"]);

header('Location:../dashmin-1.0.0/index.php');

?>