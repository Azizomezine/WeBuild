<?PHP
include_once '../Model/Question.php';
include_once '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
include_once '../controller/CategorieC.php';

	$QuestionC=new QuestionC();
    $ReponseC = new ReponseC();
    $CategorieC = new CategorieC();
    $listecategorie=$CategorieC->affichertousCategorie();
	$listeQuestion=$QuestionC->afficherquestion();
    $touslistequestion=$QuestionC->afficherallquestion();
    $somme=$QuestionC->calculerQuestion();
    $sum=$ReponseC->calculerReponse();
  //  $summ1=$ReponseC->calculerReponseQuestion($RefQC);
    if (
		isset($_POST["Search"]) 
    
        )
	 {
        if (
            !empty($_POST["Search"])  
         
        )
        {
   $touslistequestion=$QuestionC->rechercherQuestion($_POST["Search"]);
   $listeQuestion=$QuestionC->rechercherQuestionMeilleur($_POST["Search"]);
        }}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Ask online Form">
    <meta name="description" content="The Ask is a bootstrap design help desk, support forum website template coded and designed with bootstrap Design, Bootstrap, HTML5 and CSS. Ask ideal for wiki sites, knowledge base sites, support forum sites">
    <meta name="keywords" content="HTML, CSS, JavaScript,Bootstrap,js,Forum,webstagram ,webdesign ,website ,web ,webdesigner ,webdevelopment">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <title>Trippie</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>

<body>
  
    

    
  
                <!--strart col-md-3 (side bar)-->
                <aside class="col-md-3 sidebar97239">
                    <div class="status-part3821">
                        <h4>stats</h4> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"> Question(<?php foreach($somme as $row) {    echo "<td>" . $row . "</td>";
      
        } ?>)</i></a> <i class="fa fa-comment" aria-hidden="true"> Answers(<?php foreach($sum as $row) {    echo "<td>" . $row . "</td>";
      
        } ?>)</i> </div>
                    <div class="categori-part329">
                        <h4>Category</h4>
                        <ul>
                        <?PHP
				foreach($listecategorie as $Categorie){
			?>
              
                            <li><a href="categorydetails.php?idC=<?PHP echo $Categorie['idC']; ?>"><?php echo $Categorie['ncateg'];?></a></li>
                           <?php }?>
                        </ul>
                    </div>
                    <!--             social part -->
                    <div class="social-part2189">
                        <h4>Find us</h4>
                        <li class="rss-one">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-rss" aria-hidden="true"></i>

<br>
<small>To Trippie</small>

</strong> </a>
                        </li>
                        <li class="facebook-two">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-facebook" aria-hidden="true"></i>

<br>
<small>To Facebook Feed</small>

</strong> </a>
                        </li>
                        <li class="twitter-three">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-twitter" aria-hidden="true"></i>

<br>
<small>To twitter Feed</small>

</strong> </a>
                        </li>
                        <li class="youtube-four">
                            <a href="#" target="_blank"> <strong>
<span>Subscribe</span>
<i class="fa fa-youtube" aria-hidden="true"></i>

<br>
<small>To youtube Feed</small>

</strong> </a>
                        </li>
                    </div>
                   
               
                </aside>
    
 

</body>

</html>