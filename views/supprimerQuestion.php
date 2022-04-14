<?php

include '../controller/QuestionC.php';

include '../includes/head.php';

$QuestionC=new QuestionC();
$QuestionC->supprimerQuestion($_GET["RefQ"]);
header('Location:afficherMesQuestion.php');
?>