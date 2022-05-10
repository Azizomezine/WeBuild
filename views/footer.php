<?PHP
include_once '../Model/Question.php';
//include_once '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
include_once '../controller/CategorieC.php';


	$QuestionC=new QuestionC();
    $ReponseC = new ReponseC();
    $CategorieC = new CategorieC();
    $listecategorie=$CategorieC->affichertousCategorie();
	$listeQuestion=$QuestionC->afficherquestion();
    $touslistequestion=$QuestionC->afficherallquestion();
  
   

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

</head>
<body>
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
                        <?PHP  
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
    
</body>
</html>