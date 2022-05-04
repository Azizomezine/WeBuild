<?php 
include_once '../Model/Question.php';
//include_once '../Model/utilisateur.php';
include_once '../controller/CategorieC.php';
 include_once '../controller/QuestionC.php';
 include_once '../controller/utilisateurC.php';
 include_once 'navbar.php';
//require_once '../../WeBuild-utilisateurs/view/connexion.php';
//include_once 'sidebar.php';
session_start();

    $error = "";

    $Question = null;

    $QuestionC = new QuestionC();
    $CategorieC = new CategorieC();
    $usersC= new usersC();
	$listeCategorie=$CategorieC->affichertousCategorie();
    if( isset($_POST["Category"]) )
    {
   $Categorie=$CategorieC->recuperercateg($_POST["Category"]);
   $Fk=$Categorie["idC"];

}
if( isset($_POST["userfk"]) )
{
$user=$usersC->recupererusername($_POST["userfk"]);
$fk1=$user["id"];
}
    if (
		isset($_POST["TitreQ"]) && 
        isset($_POST["DesQ"]) && isset($_POST["Category"])  
    
        )
	 {
        if (
            !empty($_POST["TitreQ"]) && 
            !empty($_POST["DesQ"])  && !empty($_POST["Category"]) 
        ){
            $Question = new LeQuestion(
                $_POST['TitreQ'],
                $_POST['DesQ'], 
               $_POST["Category"],
               date('d/m/Y'),"Unresolved",$Fk,$fk1
            );
            $QuestionC->ajouterquestion($Question);
            header('Location:afficherMesQuestion.php');
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
    <script src="./node_modules/bootstrap-show-notification/src/bootstrap-show-notification.js"></script>
    
    <!-- <link href="css/animate.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> </head>
    <link href="css/responsive.css" rel="stylesheet" type="text/css"> </head>
    <style>
        .error5 {
            color: red;
        }
    </style>
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
                      <h4>Ask Question</h4>
                 <hr>
                 <div class="error5">
        <?php echo $error; ?>
    </div>
                    <form action="" method="POST">
                        <div class="question-title39">
                            <span class="form-description433">Question-Title </span><input type="text" id="TitreQ"  name="TitreQ" class="question-ttile32" placeholder="Write Your Question Title" >
                        </div>
                        <p id="errort" class="error5"></p>

                            <!-- <span class="form-description433">Question-Des </span><textarea type="text"  id="Article_editor" name="DesQ"  ></textarea> -->
   <input type="hidden" id="userfk"  name="userfk" value="<?php echo $_SESSION['username'];?>"  >    
                            
                            
    <div class="categori49">
        <span class="form-description43305">Category* </span>
        <label>
<input list="browsers"  id="Category"name="Category" class="list-category53"/></label>
<p id="errorc" class="error5"></p>
<datalist id="browsers" >
<?PHP
				foreach($listeCategorie as $Categorie){
			?>
  <option value="<?php echo $Categorie['ncateg'];?>">
 
     <?php } ?>
</datalist>
    </div>
  
         <div class="details2-239">
        <div class="col-md-12 nopadding">
       <textarea type="text"  id="Article_editor" name="DesQ"  ></textarea>
       <p id="errord" class="error5"></p>
        </div>
                        </div>	
                     

                 <div class="publish-button2389">
                    <button type="submit" class="publis1291" name='ajouter' onclick="return validerform()" >Publish your Question</button>
                </div>
                </form>
                </div>
                <form method="POST" action="logout.php"><button type="submit" class="q-type23 button-ques2973" ><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                <div id="liveAlertPlaceholder"></div>
<button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
              
                </div>
<!--                end of col-md-9 -->
           
<!--           strart col-md-3 (side bar)-->
           <aside class="col-md-3 sidebar97239">
             <div class="status-part3821">
            <h4>stats</h4>
                
                 <a href="#"><i class="fa fa-question-circle" aria-hidden="true"> Question(20)</i></a>
                 <i class="fa fa-comment" aria-hidden="true"> Answers(50)</i>
             </div>  
             <div class="categori-part329">
                 <h4>Category</h4>
                 <ul>
                 <?PHP
				foreach($listeCategorie as $Categorie){
			?>
                     <li><a href="#"><?php echo $Categorie['ncateg'];?></a></li>
                    
                     <?php }?>
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
              
<!--              logout part-->
              <div class="login-part2389">
                  <h4>Logout</h4>
                  
             
               <form method="POST" action="logout.php"> <button type="submit" class="userlogin320" >Logout</button></button>

              </div>


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
<script>function validerform() {
   
  
   var t= document.getElementById("TitreQ").value;
   var c = document.getElementById("Category").value;
   var d = document.getElementsByName("DesQ").value;
   var errort = document.getElementById('errort');
   var errorc = document.getElementById('errorc');
   var errord = document.getElementById('errord');

   if (t == "") {
       errort.innerHTML = "Please type a title";
       return false;
   }
   else {
   if(c==""){
      errorc.innerHTML="Veuillez Entrer Category"
      return false;
  }
else {
 if (d="")
 {
   errord.innerHTML="Veuillez Entrer Description"
return false;
 }

}} }
var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
var alertTrigger = document.getElementById('liveAlertBtn')

function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    alert('Can you please complete evreything ', 'success')
  })
}

/*const Filter=require("bad-words");
const filter=new Filter();
filter.addwords("aziz","iheb");
filter.clean("");*/

          
</script>
<script>
    /*	function valider() {
		var letters = /^[A-Za-z" "]+$/;
		var dateNow = new Date();
		var t= document.getElementById("TitreQ").value;
		var c = document.getElementById("Category").value;
		//var d = document.getElementsByName("DesQ").value;
		

		if (t == "") {
			alert("le TitreQ est vide ");
			return false;
		}
		else if (!(t.match(letters) )) {
	alert("Veuillez entrer un Titre valide!");
	return false ;
	}
	else if (c == "") {
			alert("category est vide !!");
			return false;
		}
		else if (!(c.match(letters) )) {
	alert("Veuillez entrer un Category valide! !");
	return false ;
	} 
}*/
</script>

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
