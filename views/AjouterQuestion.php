<?php 
include_once '../Model/Question.php';
//include_once '../Model/utilisateur.php';
include_once '../controller/CategorieC.php';
// include_once '../controller/QuestionC.php';
 include_once '../controller/utilisateurC.php';
 include_once '../controller/ReponseC.php';
 include_once 'navbar.php';
//require_once '../../WeBuild-utilisateurs/view/connexion.php';
//include_once 'sidebar.php';

    $error = "";

    $Question = null;
    $ReponseC = new ReponseC();
    $QuestionC = new QuestionC();
    $CategorieC = new CategorieC();
    $usersC= new usersC();
    $somme=$QuestionC->calculerQuestion();
    $sum=$ReponseC->calculerReponse();
    $listecategorie=$CategorieC->affichertousCategorie();
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
                <form method="POST" action="logout.php">
                <div id="liveAlertPlaceholder"></div>

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
