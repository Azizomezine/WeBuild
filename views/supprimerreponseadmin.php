<?php

include '../controller/ReponseC.php';

//include '../controller/QuestionC.php';

$ReponseC=new ReponseC();
if (isset($_POST["Idreponse"])){
$ReponseC->supprimerreponse($_POST["Idreponse"]);
header('Location:afficheradmin.php');
}
?>