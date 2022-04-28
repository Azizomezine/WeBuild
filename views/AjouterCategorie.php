<?php 
include_once '../Model/Categorie.php';
 include_once '../controller/CategorieC.php';
 include_once '../controller/QuestionC.php';
 include_once 'navbar.php';

    $error = "";
    $Categorie = null;
    $CategorieC = new CategorieC();

    if (
		isset($_POST["ncateg"]) && 
        isset($_POST["descateg"])
    
        )
	 {
        if (
            !empty($_POST["ncateg"]) && 
            !empty($_POST["descateg"])  
        ){
            $Categorie = new le_categorie(
                $_POST['ncateg'],
                $_POST['descateg']
            );
            $CategorieC->ajouterCategorie($Categorie);
            //header('Location:afficherMesCategorie.php');
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
            <h3>Add category</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Home</a></li>
                <li class="active">Add Category</li>
            </ol>
        </div>
    </section>
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <div class="ask-question-input-part032">
                      <h4>Add Category</h4>
                 <hr>
                    <form action="" method="POST">
                        <div class="question-title39">
                            <span class="form-description433">Category*</span><input type="text" id="ncateg"  name="ncateg" class="question-ttile32" placeholder="Write Your Categorie Title" >
                        </div>

                            <!-- <span class="form-description433">Categorie-Des </span><textarea type="text"  id="Article_editor" name="descateg"  ></textarea> -->
                        
                       
   
 
         <div class="details2-239">
        <div class="col-md-12 nopadding">
       <textarea type="text"  id="Article_editor" name="descateg"  ></textarea>
        </div>
                        </div>	
                     

                 <div class="publish-button2389">
                    <button type="submit" class="publis1291" name='ajouter'  >Add  Category</button>
                </div>
                </form>
                </div>
             
              
                </div>
<!--                end of col-md-9 -->
           
<
    

<script>
    	function valider() {
		var letters = /^[A-Za-z" "]+$/;
		var dateNow = new Date();
		var t= document.getElementById("ncateg").value;
		var c = document.getElementById("Category").value;
		//var d = document.getElementsByName("descateg").value;
		

		if (t == "") {
			alert("le ncateg est vide ");
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
}
</script>
<script src="main.js"></script>
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
