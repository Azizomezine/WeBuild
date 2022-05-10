<?PHP
include_once '../Model/Question.php';
include_once '../Model/Reponse.php';
//include_once '../controller/QuestionC.php';
//include_once '../controller/ReponseC.php';
include_once '../controller/utilisateurC.php';
  $usersC= new usersC();
include_once '../controller/CategorieC.php';
include_once 'navbar.php';
$ReponseC = new ReponseC();
    $QuestionC=new QuestionC();
    $CategorieC = new CategorieC();
    $listecategorie=$CategorieC->affichertousCategorie();
    $listeQuestion=$QuestionC->detailquestioncateg($_GET["idC"]);
    $somme=$QuestionC->calculerQuestion();
    $sum=$ReponseC->calculerReponse();
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
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/editor.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>

<body>
  
    <!--    body content-->
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <section class="category2781">
                    <?PHP
				foreach($listeQuestion as $Question){
			?>
            
            <div class="question-type2033">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="left-user12923 left-user12923-repeat">
                                        <?PHP $user=$usersC->recupererusers($Question['userfk']);
                                        ?>
                                            <a href="#"><img src="<?php echo $user['image'] ?>" alt="image"> </a>  <?php if(strcmp($Question['QuestionStat'],"Resolved")==0) { ?>                 <i class="fa fa-check " aria-hidden="true"></i><?php } ?> </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="right-description893">
                                            <div id="que-hedder2983">
                                            <form method="get" action="QuestionDetails.php">
                                            <div id="que-hedder2983">
<h3><a href="QuestionDetails.php?RefQ=<?PHP echo $Question['RefQ']; ?>" target="_blank"><?php echo $Question['TitreQ'];?></a></h3> </div>
<input type="hidden" name="RefQ" value="<?php echo $Question['RefQ'];?>">
<button type="submit" class="q-type238"><i class="fa fa-comment" aria-hidden="true">Details</i></button>

</form>
</div>
                                            <div class="ques-details10018">
                                             <?PHP  $good=$QuestionC->BadWordFilter($Question['DesQ']); 
                                             echo($good);
                                           // 
                                                  ?>
                                            </div>
                                            <hr>
                                            <div class="ques-icon-info3293">Username:<?php echo $user['username'] ?><a href="#"><i class="fa fa-clock-o" aria-hidden="true"><?PHP echo $Question['Date_publication']; ?></i></a> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> <?PHP echo $Question['RefQ']; ?></i></a> <a href="#"></a>
                                            <?php if($user['id']==$Question['userfk']) { ?>                <form method="POST" action="supprimerQuestion.php"><button type="submit" class="q-type23 button-ques2973" ><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" value=<?PHP echo $Question['RefQ']; ?> name="RefQ"></form><?php } ?></div>
                                            <?php if($user['id']==$Question['userfk']) { ?>              <a href="modifierQuestion.php?RefQ=<?PHP echo $Question['RefQ']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="ques-type302">
                                            <a href="#">
                                                <button type="button" class="q-type238"><i class="fa fa-comment" aria-hidden="true"> <?php  $summ1=$ReponseC->calculerReponseQuestion($Question['RefQ']); foreach($summ1 as $row1) {    echo "<td>" . $row1 . "</td>"; }?>answer </i></button>
                                            </a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?PHP
				}
			?>
                        
                    </section>
                </div>
                <!-- end of col-md-9 -->
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
                   <!--              logout part-->
              <div class="login-part2389">
                  <h4>Logout</h4>
                  
             
               <form method="POST" action="logout.php"> <button type="submit" class="userlogin320" >Logout</button></button>

              </div>


                </aside>
            </div>
        </div>
    </section>
    <!--    footer -->
    <section class="footer-part">
        <div class="container">
              <div class="row">
                <div class="col-md-3">
                    <div class="info-part-one320">
                        <h4>Who are we?</h4>
                        <p>We are trippie you can find anything here </p>
                        <h4> Our Address :</h4>
                        <p>Tunisie
                            <br> Ariana soghra esprit</p>
                        <h4>Support :</h4>
                        <p>Support Telephone No : (+2)93168934</p>
                        <p>Support Email Account : </p>
                        <p>admin998989@gmail.com</p>
                    </div>
           
                </div>
               
                <div class="col-md-3">
                    <div class="info-part-three320">
                        <h4>Recent Questions</h4>
                        <?PHP  	$listeQuestion=$QuestionC->afficherquestion();
				foreach($listeQuestion as $Questions){

			?>    
                        <div class="news-info209">
                            <h5><?php echo $Questions['TitreQ'];?></h5>
                            <div class="ques-details10018">(  <?PHP  $good=$QuestionC->BadWordFilter($Questions['DesQ']); 
                                             echo($good);
                                           // 
                                                  ?> </div><small><?PHP echo $Questions['Date_publication']; ?></small> </div> <?php } ?>
                    </div>
                </div>
               
    </section>
    <section class="footer-social">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright 2022 Trippie | <strong>Trippie</strong></p>
                </div>
                <div class="col-md-6">
                    <div class="social-right2389"> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a> </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        $(document).ready(function () {
            $("#txtEditor").Editor();
        });
    </script>
</body>

</html>