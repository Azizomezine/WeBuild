<?php 
include '../controller/QuestionC.php';
include '../includes/head.php';
include_once("navbar.php");

$QuestionC=new QuestionC();
if(isset($_POST['validate'])){
if(
    isset($_POST['DesQ'])&&
    isset($_POST['TitreQ'])&&
    isset($_POST['ContenuQ']) 
    )
{
  if (
    !empty($_POST['DesQ']) && 
!empty($_POST['TitreQ']) &&
    !empty($_POST['ContenuQ'])
) {
    $Question=new Question($_GET["RefQ"],
        nl2br($_POST['DesQ']),
      $_POST['TitreQ'],
      nl2br ($_POST['ContenuQ']),
    );
    $QuestionC->modifierQuestion($Question, $_GET["RefQ"]);
        header('Location:afficherMesQuestion.php');

}
}
else{
  $errorMsg = "Please complete all fields...";
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



  <!-- Font Awesome CDN -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">



</head>
<body>
<div class="main-wrapper">

<br><br>
<?php if (isset($_GET['RefQ'])){
				$Question = $QuestionC->recupererQuestion($_GET['RefQ']);
               
                ?>
 
    <form class="container" method="POST">
   
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Question Title</label>
            <input type="text" class="form-control" id="TitreQ"  name="TitreQ" value="<?php  echo $Question['TitreQ'];?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Question Topic</label>
            <textarea class="form-control" id="DesQ"name="DesQ" ><?php  echo $Question['DesQ'];?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Question Content</label>
            <textarea type="text" class="form-control"  id="ContenuQ" name="ContenuQ" ><?php  echo $Question['ContenuQ'];?></textarea>
        </div>
        <input type="hidden" class="form-control" id="TitreQ"  name="TitreQ" value="<?php  $_GET["email"];?>">
        <button type="submit" class="btn btn-primary" name="validate" >Modify Question</button>
        <button><a href="afficherMesQuestion.php">Return </a></button>
   </form>
   <?php
		}
		?>
        </div>
</body>
</html> 