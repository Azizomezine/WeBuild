<?php

//include '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
$QuestionC=new QuestionC();
$Reponse=new ReponseC();
if (isset($_POST["RefQ"])){
$Reponse->supprimerreponseadmin($_POST["RefQ"]);
$QuestionC->supprimerQuestion($_POST["RefQ"]);

header('Location:afficheradmin.php');
}
?>