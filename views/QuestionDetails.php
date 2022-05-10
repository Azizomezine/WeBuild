<?PHP
include_once '../Model/Question.php';
include_once '../Model/Reponse.php';
//include_once '../controller/QuestionC.php';
//include_once '../controller/ReponseC.php';
include_once 'navbar.php';
include_once '../controller/CategorieC.php';
include('server.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
include_once '../controller/utilisateurC.php';
	$QuestionC=new QuestionC();
    $usersC= new usersC();
    $user3=$usersC->recupererusername($_SESSION['username']);
    $fk3=$user3["id"];
  

   

	$Question=$QuestionC->detailquestion($_GET["RefQ"]);   
    $error = "";
    $Reponse = null;
    $ReponseC = new ReponseC();
    $somme=$QuestionC->calculerQuestion();
    $sum=$ReponseC->calculerReponse();
    $CategorieC = new CategorieC();
    $listecategorie=$CategorieC->affichertousCategorie();
    $listeReponse=$ReponseC->afficherreponse($_GET["RefQ"]);
    if( isset($_POST["userfk"]) )
{
$user=$usersC->recupererusername($_POST["userfk"]);
$fk1=$user["id"];
$email=$user["email"];
}
$user1=$usersC->recupererusers($Question['userfk']);
    
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                            	<i <?php if (userLiked($Question['RefQ'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $Question['RefQ'] ?>"></i>
      	<span class="likes"><?php echo getLikes($Question['RefQ']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($Question['RefQ'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $Question['RefQ'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($Question['RefQ']); ?></span> </div>
                            </div>
                        </div>
                    </div>
                 
                   
                    <div class="author-details8392">
                        <div class="author-img202l"> <img src="<?php echo $user1['image'] ?> " alt="image">
                        </div> 
                   <h5>Author:<?php echo $user1['username'] ?></h5>
                    <p>Hi This is <?php echo $user1['nom'] ?> <?php echo $user1['prenom'] ?> my age is <?php echo $user1['age'] ?> and if you want to contact me my email is:<?php echo $user1['email'] ?>  </p>
                    
                </div>
                    <div class="comment-list12993">
                        <div class="container">
                            <div class="row">
                           
                                <div class="comments-container">
                              
            <?php 
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
     
      
     $body='  <html> 
     <head> 
         <title>Welcome to CodexWorld</title> 
     </head> 
     <body style="margin:0;padding:0;">
     <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
    <tr>
    <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
    <a href="https://ibb.co/5hb3kZD"><img src="https://i.ibb.co/ZzqrS9s/LOGO.png" alt="LOGO" style="height:auto;display:block;"></a>  
</td>
    </tr>
    <tr>
  
    <td style="padding:36px 30px 42px 30px;background-color:powderblue;">
     '.$_POST['Contentreponse'].'
    </td>
</tr>
    <tr>
        <td style="padding:0;background:#ee4c50;">
        Author:'.$_SESSION['username'].'
        </td>
    </tr>
</table>
</body>
     </html>';  
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
            $mail->setFrom('pojetweb770@gmail.com', $_SESSION['username']);
           // $mail->addAddress('projetweb770@gmail.com');     // Add a recipient
           $mail->addAddress($email);     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Replay was posted ';
            $mail->Body    = $body;
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
  
  ?>
    <?PHP
                    
				foreach($listeReponse as $Reponse){
                 
                    $user2=$usersC->recupererusers($Reponse['userfk']);
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
                                              </div>
                                                </div>
                                                <?php if($fk3==$Reponse['userfk']) { ?>                        <form method="POST" action="supprimerreponse.php"><button type="submit" class="q-type23 button-ques2973" ><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" value=<?PHP echo $Reponse['Idreponse']; ?> name="Idreponse"><input type="hidden" value=<?PHP echo $Question['RefQ']; ?> name="RefQ"></form><?php } ?>
                                                <?php if($fk3==$Reponse['userfk']) { ?>     <div class="ques-icon-info3293">   <a href="modifierReponse.php?Idreponse=<?PHP echo $Reponse['Idreponse']; ?>& RefQ=<?PHP echo $Reponse['RefQC']; ?>" ><i class="fa fa-edit" style="font-size: 26px;"></i></a> </div> <?php }?>
      
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
        <script >
    $(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
  	action = 'like';
  } else if($clicked_btn.hasClass('fa-thumbs-up')){
  	action = 'unlike';
  }
  $.ajax({
  	url: 'index.php',
  	type: 'post',
  	data: {
  		'action': action,
  		'post_id': post_id
  	},
  	success: function(data){
  		res = JSON.parse(data);
  		if (action == "like") {
  			$clicked_btn.removeClass('fa-thumbs-o-up');
  			$clicked_btn.addClass('fa-thumbs-up');
  		} else if(action == "unlike") {
  			$clicked_btn.removeClass('fa-thumbs-up');
  			$clicked_btn.addClass('fa-thumbs-o-up');
  		}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);

  		// change button styling of the other button if user is reacting the second time to post
  		$clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
  	}
  });		

});

// if the user clicks on the dislike button ...
$('.dislike-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
  	action = 'dislike';
  } else if($clicked_btn.hasClass('fa-thumbs-down')){
  	action = 'undislike';
  }
  $.ajax({
  	url: 'index.php',
  	type: 'post',
  	data: {
  		'action': action,
  		'post_id': post_id
  	},
  	success: function(data){
  		res = JSON.parse(data);
  		if (action == "dislike") {
  			$clicked_btn.removeClass('fa-thumbs-o-down');
  			$clicked_btn.addClass('fa-thumbs-down');
  		} else if(action == "undislike") {
  			$clicked_btn.removeClass('fa-thumbs-down');
  			$clicked_btn.addClass('fa-thumbs-o-down');
  		}
  		// display the number of likes and dislikes
  		$clicked_btn.siblings('span.likes').text(res.likes);
  		$clicked_btn.siblings('span.dislikes').text(res.dislikes);
  		
  		// change button styling of the other button if user is reacting the second time to post
  		$clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
  	}
  });	

});

});
  </script>
    </section>
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