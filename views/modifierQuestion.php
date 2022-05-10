<?php 

include_once '../model/Question.php';
include_once '../controller/utilisateurC.php';
include_once '../controller/QuestionC.php';
include_once 'navbar.php';
//session_start();
$usersC= new usersC();
  $QuestionC = new QuestionC();
  $error = "";
  if( isset($_POST["userfk"]) )
{
$user=$usersC->recupererusername($_POST["userfk"]);
$fk1=$user["id"];
}
  if (
    isset($_POST["TitreQ"]) && 
    isset($_POST["DesQ"]) && isset($_POST["Category"]) && isset($_POST["QuestionStat"]) 

    )
 {
    if (
        !empty($_POST["TitreQ"]) &&  
        !empty($_POST["DesQ"])  && !empty($_POST["Category"])   && isset($_POST["QuestionStat"]) 
    ){
          $Question = new LeQuestion(
            $_POST['TitreQ'],
            $_POST['DesQ'], 
           $_POST["Category"],
           date('d/m/Y'),$_POST["QuestionStat"],$_POST["IdCfk"],$fk1
          );
          
          $QuestionC->modifierQuestion($Question, $_GET['RefQ']);
          header('refresh:2;url=afficherMesQuestion.php');
      }
      else
          $error = "Missing information";
  }
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
    <link href="css/responsive.css" rel="stylesheet" type="text/css"> </head>

<body>
   
    <section class="header-descriptin329">
        <div class="container">
            <h3>Ask Question</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Home</a></li>
                <li class="active">Ask Question</li>
            </ol>
        </div>
    </section>
    <section class="main-content920">

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <div class="ask-question-input-part032">
                <?php
			if (isset($_GET['RefQ'])){
				$Question = $QuestionC->recupererQuestion($_GET['RefQ']);
				
        ?>
                      <h4>Modify  Question</h4>
                 <hr>
           
                    <form action="" method="POST">
                      
                        <div class="question-title39">
                            <span class="form-description433">Question-Title </span><input type="text" id="TitreQ"  name="TitreQ" class="question-ttile32" value="<?php echo $Question['TitreQ']; ?>" required>
                        </div>

                            <!-- <span class="form-description433">Question-Des </span><textarea type="text"  id="Article_editor" name="DesQ"  ></textarea> -->
                
                                    
    <div class="categori49">
        <span class="form-description43305">QuestionStat* </span>
        <label>
<input list="browsers"  name="QuestionStat" id="QuestionStat" class="list-category53" value="<?php echo $Question['QuestionStat']; ?>"/></label>
<datalist id="browsers" >
<option value="Unresolved" >Unresolved</option>
                         <option value="Resolved">Resolved</option>
</datalist>
    </div>
                       
    <div class="categori49">
        <span class="form-description43305">Category* </span>
        <label>
<input list="browsers"  id="Category"name="Category" class="list-category53" value="<?php echo $Question['Category']; ?>"/></label>
<datalist id="browsers" >
  <option value="Security">
  <option value="Harassment">
  <option value="Web Help">
  <option value="Public event">
  <option value="News">
</datalist>
    </div>
 
         <div class="details2-239">
        <div class="col-md-12 nopadding">
       <textarea type="text"  id="Article_editor" name="DesQ"   ><?php echo $Question['DesQ']; ?></textarea>
        </div>
                        </div>	
                     

                 <div class="publish-button2389">
                    <button type="submit" class="publis1291" name='modifer' value="modifiy">Modify your Question</button>
                    <input type="hidden" name="IdCfk" id="IdCfk"value="<?php echo $Question['IdCfk'];?>">
                    <input type="hidden" id="userfk"  name="userfk" value="<?php echo $_SESSION['username'];?>"  >    
                </div>
                </form>
                <?php
		}
		?>
                </div>
             
              
                </div>
<!--                end of col-md-9 -->
           

<!--    footer -->
   <div class="footer-search">
     <div class="container">
	<div class="row">
           <div id="custom-search-input">
                            <div class="input-group col-md-12">
                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <input type="text" class="  search-query form-control user-control30" placeholder="Search here...." />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
	</div>
</div>
   </div>
    
    <section class="footer-part">
        <div class="container">
            <div class="row">
                
                <div class="col-md-3">
                  <div class="info-part-one320">
                   <h4>Where We Are ?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu.</p>
                    <h4>Address :</h4>
                    <p>Tunisie<br> Ariana,Esprit.</p>
                    <h4>Support :</h4>
                    <p>Support Telephone No : (+2)01111011110</p>
                    <p>Support Email Account : </p>
                    <p>info@example.com</p>
                    </div>
                </div>
                   <div class="col-md-3">
                  <div class="info-part-two320">
              <h4>Quick Links</h4>
                   <a href="#"><p>-Home</p></a>
                     <a href="#"><p>-Ask Question</p></a>
                     <a href="#"><p>-Questions</p></a>
                     <a href="#"><p>-Users</p></a>
                     <a href="#"><p>-Edit Profile</p></a>
                     <a href="#"><p>-Page</p></a>
                     <a href="#"><p>-Contact Us</p></a>
                     <a href="#"><p>-Buy now</p></a>
                    </div>
                </div>
                   <div class="col-md-3">
                  <div class="info-part-three320">
                   <h4>Popular Questions</h4>
                  <div class="news-info209">
                  
                   <h5>Why are the British confused</h5>
                    <p>(Why I darest say, they darest not get offended when they so ...</p>
                    <small>July 16, 2017</small>
                      </div>
                       <div class="news-info209">
                <h5>How to approach applying for</h5>
                    <p>(I am trying to find/change my career trajectory. Its a good cozy ...</p>
                    <small>July 16, 2017</small>
                      </div>
                        <div class="news-info209">
                <h5>How to evaluate whether a</h5>
                    <p>A friend of mine is the CEO of his own small business. ...</p>
                    <small>July 16, 2017</small>
                      </div>
                    
                    </div>
                </div>
                   <div class="col-md-3">
                  <div class="info-part-four320">
                   <h4>Latest Tweets</h4>
                   <div class="tweet-details29">
                    <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
                     Themehttps://t.co/urb3LgsOCi</a></p>
                     <small>about 2 weeks ago</small>
                      </div>
                            <div class="tweet-details29">
                    <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
                     Themehttps://t.co/urb3LgsOCi</a></p>
                     <small>about 2 weeks ago</small>
                      </div>
                            <div class="tweet-details29">
                    <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
                     Themehttps://t.co/urb3LgsOCi</a></p>
                     <small>about 2 weeks ago</small>
                      </div>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="footer-social">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Copyright 2022 Aziz | <strong>Trippie Coder</strong></p>
            </div>
             <div class="col-md-6">
              <div class="social-right2389">
               <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
               <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                 </div>
            </div>
        </div>
    </div>
</section>
 
      <script src="ckeditor/ckeditor.js"></script>
      <script >
       CKEDITOR.replace('Article_editor');
     </script>
   	<script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
			});
		</script>
  
</body>

</html>
