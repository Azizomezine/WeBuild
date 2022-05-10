<?php
include_once '../Model/Question.php';
include_once '../Model/Reponse.php';
include_once '../Model/Categorie.php';
//include_once '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
include_once '../controller/CategorieC.php';
$CategorieC=new  CategorieC();
$QuestionC=new QuestionC();
if (isset($_POST["idC"])){
    $QuestionC->supprimerQuestioncateg($_POST["idC"]);
$CategorieC->supprimerCategorie($_POST["idC"]);

header('Location:afficheradmin.php');
}
?>