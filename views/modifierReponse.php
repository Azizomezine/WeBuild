<?php 
include_once '../Model/Question.php';
include_once '../Model/Reponse.php';
//include_once '../controller/QuestionC.php';
//include_once '../controller/ReponseC.php';
include_once '../controller/utilisateurC.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
session_start();
  $ReponseC = new ReponseC();
  $usersC= new usersC();
  
  $error = "";
  if( isset($_POST["userfk"]) )
  {
  $user=$usersC->recupererusername($_POST["userfk"]);
  $fk1=$user["id"];
  }
  
  if (
    isset($_POST["Contentreponse"])     && isset($_POST["RefQC"]) 


    )
 {
    if (
        !empty($_POST["Contentreponse"])  && !empty($_POST["RefQC"]) 
   
    ){
        $mail = new PHPMailer(true);

        try {
            //Server settings                    // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host  = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'projetweb770@gmail.com';                     // SMTP username
            $mail->Password   = '123456web';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 25;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients Email sender
            $mail->setFrom('projetweb770@gmail.com', $_SESSION['username']);
            $mail->addAddress('projetweb770@gmail.com');     // Add a recipient
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Replay was modified';
            $mail->Body    = $_POST['Contentreponse'];
        
            $mail->send();
   
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
        $Reponse = new le_reponse(
            $_POST['Contentreponse'],
           date('d/m/Y'), $_POST['RefQC'],$fk1
        );
          
          $ReponseC->modifierReponse($Reponse, $_GET['Idreponse']);
        echo( $_POST['Contentreponse']);
     //   echo( $_GET['Idreponse']);
        echo($_POST['RefQC']);
          $h=$_POST['RefQC'];
     header("Location:QuestionDetails.php?RefQ=$h");
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
    <div class="top-bar">
    </div>
    <div class="top-menu-bottom932">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="#"><img src="image/logo.png" alt="Logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Home</a></li>
                      
                        <li><a href="index.html">CARPOOL</a></li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Disscussion Forum <span class="caret"></span></a>
                            <ul class="dropdown-menu animated zoomIn">
                                <li><a href="contact_us.html"> Contact Us</a></li>
                                <li><a href="#"> Ask Reponse </a></li>
                                <li><a href="afficherMesReponse.php"> Post-Details </a></li>
                                <li><a href="afficherMesReponse.php">All User</a></li>
                                <li><a href="user_question.html"> User Reponse </a></li>
                                <li><a href="category.html"> Category </a></li>
                               
                            </ul>
                        </li>
                        <li><a href="contact_us.html">Contact us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <section class="header-descriptin329">
        <div class="container">
            <h3>Modify Answer</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Home</a></li>
                <li class="active">Modify Answer</li>
            </ol>
        </div>
    </section>
    <section class="main-content920">

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <div class="ask-question-input-part032">
                <?php
			if (isset($_GET['Idreponse'])){
				$Reponse = $ReponseC->recupererReponse($_GET['Idreponse']);
				
        ?>
                      <h4>Modify Answer</h4>
                 <hr>
           
                    <form action="" method="POST">
                      
                     
 
         <div class="details2-239">
        <div class="col-md-12 nopadding">
       <textarea type="text"  id="Article_editor" name="Contentreponse"><?php echo $Reponse['Contentreponse']; ?></textarea>
        </div>
                        </div>	
                     

                 <div class="publish-button2389">
                    <button type="submit" class="publis1291" name='modifer' value="modifiy">Modify your Answer</button>
                    <input type="hidden" id="userfk"  name="userfk" value="<?php echo $_SESSION['username'];?>"  >    
                      <input type="hidden" name="RefQC" id="RefQC"value="<?php echo $_GET['RefQ'];?>">
       
                </div>
                </form>
                <?php
		}
		?>
                </div>
             
              
                </div>
<!--                end of col-md-9 -->
           
<!--           strart col-md-3 (side bar)-->
           <aside class="col-md-3 sidebar97239">
             <div class="status-part3821">
            <h4>stats</h4>
                
                 <a href="#"><i class="fa fa-question-circle" aria-hidden="true"> Reponse(20)</i></a>
                 <i class="fa fa-comment" aria-hidden="true"> Answers(50)</i>
             </div>  
             <div class="categori-part329">
                 <h4>Category</h4>
                 <ul>
                     <li><a href="#">Web Help</a></li>
                     <li><a href="#">Security</a></li>
                     <li><a href="#">Harassment</a></li>
                     <li><a href="#">News</a></li>
                     
                 </ul>
             </div>
             
<!--             social part -->
              <div class="social-part2189">
              <h4>Find us</h4>
             <li class="rss-one">
                <a href="#" target="_blank">
                 <strong>
                    <span>Subscribe</span>
                     <i class="fa fa-rss" aria-hidden="true"></i>
       
                     <br>
                     <small>To RSS Feed</small>
                     
                 </strong>
                 </a>
             </li>
                       <li class="facebook-two">
                <a href="#" target="_blank">
                 <strong>
                    <span>Subscribe</span>
                         <i class="fa fa-facebook" aria-hidden="true"></i>
       
                     <br>
                     <small>To Facebook Feed</small>
                     
                 </strong>
                 </a>
             </li>
                                <li class="twitter-three">
                <a href="#" target="_blank">
                 <strong>
                    <span>Subscribe</span>
                <i class="fa fa-twitter" aria-hidden="true"></i>
       
                     <br>
                     <small>To twitter Feed</small>
                     
                 </strong>
                 </a>
             </li>
                                <li class="youtube-four">
                <a href="#" target="_blank">
                 <strong>
                    <span>Subscribe</span>
               <i class="fa fa-youtube" aria-hidden="true"></i>
       
                     <br>
                     <small>To youtube Feed</small>
                     
                 </strong>
                 </a>
             </li>
                  
              </div>
              
<!--              login part-->
              <div class="login-part2389">
                  <h4>Login</h4>
                  <div class="input-group300">
                  <span><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="text" class="namein309" placeholder="Username">
                  </div>
                      <div class="input-group300">
                  <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                  <input type="password" class="passin309" placeholder="Name">
                  </div>
                  <a href="#"><button type="button" class="userlogin320">Log In</button></a>
                  <div class="rememberme">
								<label><input type="checkbox" checked="checked"> Remember Me</label>
								<a href="#" class="resbutton3892">Register</a>
							</div>
              </div>
<!--              highest part-->
              <div class="highest-part302">
                <h4>Highest Points</h4>  
                <div class="pints-wrapper">
                 <div class="left-user3898">
                     <a href="#"><img src="image/images.png" alt="Image"></a>
                     <div class="imag-overlay39">
                         <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     </div>
                 </div>
                 <span class="points-details938">
                     <a href="#"><h5>Mohamed Aziz</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span>
                 
                  </div>
                  <hr>
                           <div class="pints-wrapper">
                 <div class="left-user3898">
                     <a href="#"><img src="image/images.png" alt="Image"></a>
                     <div class="imag-overlay39">
                         <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     </div>
                 </div>
                 <span class="points-details938">
                     <a href="#"><h5>Omezine Aya</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span>
                 
                  </div>
                  <hr>
                           <div class="pints-wrapper">
                 <div class="left-user3898">
                     <a href="#"><img src="image/images.png" alt="Image"></a>
                     <div class="imag-overlay39">
                         <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     </div>
                 </div>
                 <span class="points-details938">
                     <a href="#"><h5>Aziz Omezine</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span>
                 
                  </div>
                  <hr>
                  <div class="pints-wrapper">
                 <div class="left-user3898">
                     <a href="#"><img src="image/images.png" alt="Image"></a>
                     <div class="imag-overlay39">
                         <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     </div>
                 </div>
                 <span class="points-details938">
                     <a href="#"><h5>Aymen zwari</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span>
                 
                  </div>
                  <hr>
             
              </div>
<!--               end of Highest points -->
<!--          start tags part-->
<div class="tags-part2398">
    <h4>Tags</h4>
    <ul>
        <li><a href="#">CARS</a></li>
        <li><a href="#">BUS</a></li>
        <li><a href="#">AIRPLANE</a></li>
        <li><a href="#">TIME</a></li>
      
        
    </ul>
    
    
</div>
<!--          End tags part-->
<!--        start recent post  -->
<div class="recent-post3290">
    <h4>Recent Post</h4>
    <div class="post-details021">
        <a href="#"><h5>How much do web developers</h5></a>
        <p>I am thinking of pursuing web developing as a career & was ...</p>
        <small style="color: #848991">July 16, 2017</small>
    </div>
    <hr>
        <div class="post-details021">
        <a href="#"><h5>How much do web developers</h5></a>
        <p>I am thinking of pursuing web developing as a career & was ...</p>
        <small style="color: #848991">July 16, 2017</small>
    </div>
       <hr>
        <div class="post-details021">
        <a href="#"><h5>How much do web developers</h5></a>
        <p>I am thinking of pursuing web developing as a career & was ...</p>
        <small style="color: #848991">July 16, 2017</small>
    </div>
    
    
</div>
<!--       end recent post    -->
          
           </aside>
            </div>
        </div>
    </section>
    
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
                     <a href="#"><p>-Ask Reponse</p></a>
                     <a href="#"><p>-Reponses</p></a>
                     <a href="#"><p>-Users</p></a>
                     <a href="#"><p>-Edit Profile</p></a>
                     <a href="#"><p>-Page</p></a>
                     <a href="#"><p>-Contact Us</p></a>
                     <a href="#"><p>-Buy now</p></a>
                    </div>
                </div>
                   <div class="col-md-3">
                  <div class="info-part-three320">
                   <h4>Popular Reponses</h4>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <script src="js/editor.js"></script>
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
