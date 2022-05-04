<?PHP
include_once '../Model/Question.php';
include_once '../Model/Reponse.php';
//include_once '../controller/QuestionC.php';
include_once '../controller/ReponseC.php';
include_once 'navbar.php';
include_once '../controller/utilisateurC.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
session_start();
	$QuestionC=new QuestionC();
    $usersC= new usersC();

	$Question=$QuestionC->detailquestion($_GET["RefQ"]);   
    $error = "";
    $Reponse = null;
    $ReponseC = new ReponseC();
    $listeReponse=$ReponseC->afficherreponse($_GET["RefQ"]);
    if( isset($_POST["userfk"]) )
{
$user=$usersC->recupererusername($_POST["userfk"]);
$fk1=$user["id"];
}
    if (
		isset($_POST["Contentreponse"]) 
    && isset($_POST["RefQC"]) 
    
        )
	 {
        if (
            !empty($_POST["Contentreponse"])  && !empty($_POST["RefQC"]) 
       
        ){
            $Reponse = new le_reponse(
                $_POST['Contentreponse'],
               date('d/m/Y'), $_POST['RefQC'],$fk1
            );
           
            // Instantiation and passing `true` enables exceptions
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
                $mail->Subject = 'Replay was posted ';
                $mail->Body    = $_POST['Contentreponse'];
            
                $mail->send();
                $ReponseC->ajouterreponse($Reponse);
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            } 

          //header('Location:afficherMeQuestion.php');
        }
        else
            $error = "Missing information";
    }
   $user1=$usersC->recupererusers($Question['userfk']);
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
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
     </head>

<body>
  
   
    <section class="header-descriptin329">
        <div class="container">
            <h3>Post Details</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Home</a></li>
                <li><a href="#">Post Details</a></li>
                <li class="active"><?PHP echo $Question['TitreQ']; ?></li>
            </ol>
        </div>
    </section>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="post-details">
                        <div class="details-header923">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="post-title-left129">
                                        <h3><?PHP  $good=$QuestionC->BadWordFilter($Question['DesQ']); 
                                             echo($good)?></h3> </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="post-que-rep-rihght320"> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Question</a> <a href="#" class="r-clor10">Report</a> </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="post-details-info1982">
                            <p></p>
                          
                            <hr>
                            <div class="post-footer29032">
                            <div class="l-side2023">   <?php if(strcmp($Question['QuestionStat'],"Resolved")==0) { ?>                 <i class="fa fa-check check2" aria-hidden="true"> solved</i> <?php }  else if(strcmp($Question['QuestionStat'],"Unresolved")==0) { ?>   <i class="fa fa-check check2" aria-hidden="true"> Unsolved</i> <?php } ?> <i class="fa fa-clock-o clock2" aria-hidden="true"> <?PHP echo $Question['Date_publication']; ?></i></div>
                                <div class="l-rightside39">
                                    <button type="button" class="tolltip-button thumbs-up2" data-toggle="tooltip" data-placement="bottom" title="Like"><i class="fa fa-thumbs-o-up " aria-hidden="true"></i></button>
                                    <button type="button" class="tolltip-button  thumbs-down2" data-toggle="tooltip" data-placement="bottom" title="Dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></button> <span class="single-question-vote-result">+22</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="share-tags-page-content12092">
                        <div class="l-share2093"> <i class="fa fa-share" aria-hidden="true"> Share</i> </div>
                        <div class="R-tags309"> <i class="fa fa-tags" aria-hidden="true"> Wordpress, Question, Developer</i> </div>
                    </div>
                   
                    <div class="author-details8392">
                        <div class="author-img202l"> <img src="<?php echo $user1['image'] ?> " alt="image">
                            <div class="au-image-overlay text-center"> <a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> </div>
                        </div> <span class="author-deatila04re">
                   <h5>Author:<?php echo $user1['username'] ?></h5>
                    <p>Hi This is <?php echo $user1['nom'] ?> <?php echo $user1['prenom'] ?> my age is <?php echo $user1['age'] ?> and if you want to contact me my email is:<?php echo $user1['email'] ?>  </p>
                    
                </div>
                    <div class="comment-list12993">
                        <div class="container">
                            <div class="row">
                           
                                <div class="comments-container">
                                <?PHP
                                $user2=$usersC->recupererusername($_SESSION['username']);
				foreach($listeReponse as $Reponse){
			?>
            <?PHP 
                                        ?>
                                    <ul id="comments-list" class="comments-list">
                                        <li>
                                             <div class="comment-main-level">
                                                <!-- Avatar -->
                                                <div class="comment-avatar"><img src="<?php echo $user2['image'] ?>" alt=""></div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    
                                                    <div class="comment-head">
                                                        <h6 class="comment-name"><a href="#"><?php echo $user2['username'] ?></a></h6></div>
                                                    <div class="comment-content"><?php echo $Reponse['Contentreponse'];?></div>
                                                    <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-folder" aria-hidden="true"> Details</i></a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"><?PHP echo $Question['Date_publication']; ?></i></a> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> <?PHP echo $Question['RefQ']; ?></i></a> <a href="#"><i class="fa fa-bug" aria-hidden="true"> Report</i></a>
                                            <form method="POST" action="supprimerreponse.php"><button type="submit" class="q-type23 button-ques2973" ><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" value=<?PHP echo $Reponse['Idreponse']; ?> name="Idreponse"><input type="hidden" value=<?PHP echo $Question['RefQ']; ?> name="RefQ"></form></div>
                                                </div>
                                                <div class="ques-icon-info3293">   <a href="modifierReponse.php?Idreponse=<?PHP echo $Reponse['Idreponse']; ?>& RefQ=<?PHP echo $Reponse['RefQC']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a> </div>
      
                                        </li>
                                        
                                        <?php } ?>
                                    </ul>
                        
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment289-box">
                    <form action="" method="POST">
                        <h3>Leave A Reply</h3>
                        <hr>
                        <div class="row">
                           
                      
                            <div class="details2-239">
        
       <textarea type="text"  id="Article_editor" name="Contentreponse"  ></textarea>
       
                        </div>	
</form>

                 <div class="publish-button2389">
                
                    <button type="submit" class="pos393-submit" name='ajouter' >Post Your Answer</button>
                    <input type="hidden" name="RefQC" id="RefQC"value="<?php echo $_GET['RefQ'];?>">
                   <input type="hidden" id="userfk"  name="userfk" value="<?php echo $_SESSION['username'];?>"  >    
                         
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!--                end of col-md-9 -->
                <!--           strart col-md-3 (side bar)-->
                <aside class="col-md-3 sidebar97239">
                    <div class="status-part3821">
                        <h4>stats</h4> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"> Question(20)</i></a> <i class="fa fa-comment" aria-hidden="true"> Answers(50)</i> </div>
                    <div class="categori-part329">
                        <h4>Category</h4>
                        <ul>
                            <li><a href="#">web developer</a></li>
                            <li><a href="#">Andriod developer</a></li>
                            <li><a href="#">grapics developer</a></li>
                            <li><a href="#">web developer</a></li>
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
                     <small>To RSS Feed</small>
                     
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
                    <!--              login part-->
                    <div class="login-part2389">
                        <h4>Login</h4>
                        <div class="input-group300"> <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" class="namein309" placeholder="Username"> </div>
                        <div class="input-group300"> <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="password" class="passin309" placeholder="Name"> </div>
                        <a href="#">
                            <button type="button" class="userlogin320">Log In</button>
                        </a>
                        <div class="rememberme">
                            <label>
                                <input type="checkbox" checked="checked"> Remember Me</label> <a href="#" class="resbutton3892">Register</a> </div>
                    </div>
                    <!--              highest part-->
                    <div class="highest-part302">
                        <h4>Highest Points</h4>
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="image/images.png" alt="Image"></a>
                                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
                            </div> <span class="points-details938">
                     <a href="#"><h5>Ahmed Hasan</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span> </div>
                        <hr>
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="image/images.png" alt="Image"></a>
                                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
                            </div> <span class="points-details938">
                     <a href="#"><h5>Ahmed Hasan</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span> </div>
                        <hr>
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="image/images.png" alt="Image"></a>
                                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
                            </div> <span class="points-details938">
                     <a href="#"><h5>Ahmed Hasan</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span> </div>
                        <hr>
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="image/images.png" alt="Image"></a>
                                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
                            </div> <span class="points-details938">
                     <a href="#"><h5>Ahmed Hasan</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span> </div>
                        <hr>
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="image/images.png" alt="Image"></a>
                                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
                            </div> <span class="points-details938">
                     <a href="#"><h5>Ahmed Hasan</h5></a>
                <a href="#" class="designetion439">Pundit</a>
                     <p>206 points</p>
                 </span> </div>
                    </div>
                    <!--               end of Highest points -->
                    <!--          start tags part-->
                    <div class="tags-part2398">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="#">analytics</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Developer</a></li>
                            <li><a href="#">Google</a></li>
                            <li><a href="#">Interview</a></li>
                            <li><a href="#">Programmer</a></li>
                            <li><a href="#">Salary</a></li>
                            <li><a href="#">University</a></li>
                            <li><a href="#">Employee</a></li>
                        </ul>
                    </div>
                    <!--          End tags part-->
                    <!--        start recent post  -->
                    <div class="recent-post3290">
                        <h4>Recent Post</h4>
                        <div class="post-details021"> <a href="#"><h5>How much do web developers</h5></a>
                            <p>I am thinking of pursuing web developing as a career & was ...</p> <small style="color: #848991">July 16, 2017</small> </div>
                        <hr>
                        <div class="post-details021"> <a href="#"><h5>How much do web developers</h5></a>
                            <p>I am thinking of pursuing web developing as a career & was ...</p> <small style="color: #848991">July 16, 2017</small> </div>
                        <hr>
                        <div class="post-details021"> <a href="#"><h5>How much do web developers</h5></a>
                            <p>I am thinking of pursuing web developing as a career & was ...</p> <small style="color: #848991">July 16, 2017</small> </div>
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
                    <div class="input-group col-md-12"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <input type="text" class="  search-query form-control user-control30" placeholder="Search here...." /> <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span> </button>
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
                        <p>Ask Me Network, 33 Street, syada
                            <br> Zeinab, Cairo, Egypt.</p>
                        <h4>Support :</h4>
                        <p>Support Telephone No : (+2)01111011110</p>
                        <p>Support Email Account : </p>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-part-two320">
                        <h4>Quick Links</h4>
                        <a href="#">
                            <p>-Home</p>
                        </a>
                        <a href="#">
                            <p>-Ask Question</p>
                        </a>
                        <a href="#">
                            <p>-Questions</p>
                        </a>
                        <a href="#">
                            <p>-Users</p>
                        </a>
                        <a href="#">
                            <p>-Edit Profile</p>
                        </a>
                        <a href="#">
                            <p>-Page</p>
                        </a>
                        <a href="#">
                            <p>-Contact Us</p>
                        </a>
                        <a href="#">
                            <p>-Buy now</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-part-three320">
                        <h4>Popular Questions</h4>
                        <div class="news-info209">
                            <h5>Why are the British confused</h5>
                            <p>(Why I darest say, they darest not get offended when they so ...</p> <small>July 16, 2017</small> </div>
                        <div class="news-info209">
                            <h5>How to approach applying for</h5>
                            <p>(I am trying to find/change my career trajectory. Its a good cozy ...</p> <small>July 16, 2017</small> </div>
                        <div class="news-info209">
                            <h5>How to evaluate whether a</h5>
                            <p>A friend of mine is the CEO of his own small business. ...</p> <small>July 16, 2017</small> </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-part-four320">
                        <h4>Latest Tweets</h4>
                        <div class="tweet-details29">
                            <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
                     Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                        <div class="tweet-details29">
                            <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
                     Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                        <div class="tweet-details29">
                            <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
                     Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-social">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright 2017 Ask me | <strong>Sudo  Coder</strong></p>
                </div>
                <div class="col-md-6">
                    <div class="social-right2389"> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a> </div>
                </div>
            </div>
        </div>
    </section>
   <script>
       /*function myfunction(x) {
           x.classList.toggle("")
       }*/
    </script>
    <script src="ckeditor/ckeditor.js"></script>
      <script >
       CKEDITOR.replace('Article_editor');
     </script>
</body>

</html>