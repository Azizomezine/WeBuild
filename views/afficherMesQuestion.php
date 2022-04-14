
<?PHP
	include "../controller/BlogC.php";

	$QuestionC=new BlogC();
	$listeQuestion=$blogC->afficherquestion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    foreach($liste as $Question) {   
?>  
     <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action " aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Title:<?php  echo $Question ['TitreQ'];?></h5>
      <small><?php  echo $Question ['Date_publication'];?></small>
    </div>
    <p class="mb-1"><?php echo $Question ['DesQ'];?></p>
    <small>QRef:<?php echo $Question ['RefQ'];?></small>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a  class="btn btn-primary">Accéder à la Question</a>
                        <a  href="modifierQuestion.php?RefQ=<?php echo $Question['RefQ'];  ?>" class="btn btn-warning" >Modifier la Question</a>
                      
                        <a  href="supprimerQuestion.php?RefQ=<?php echo $Question['RefQ'];  ?>"  class="btn btn-danger" >Supprimer la Question</a>
                        </div>
  </a> 
  </div>
           
<?php
 }
?>
 
</body>
</html>