<?php

include '../controller/QuestionC.php';

$QuestionC=new QuestionC();
if (isset($_POST["RefQ"])){
$QuestionC->supprimerQuestion($_POST["RefQ"]);
header('Location:afficherMesQuestion.php');
}
?>