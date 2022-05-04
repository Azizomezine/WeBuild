<?php 
include_once '../Model/Categorie.php';
 include_once '../controller/CategorieC.php';
 include_once '../controller/QuestionC.php';


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
            header('Location:afficheradmin.php');
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
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib1/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib1/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css1/style.css" rel="stylesheet">
<!-- Customized Bootstrap Stylesheet -->
<link href="css1/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css1/style.css" rel="stylesheet">
<body>
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="AjouterCategorie.php" class="nav-item nav-link"><i class="fa fa-plus"></i>Add Category</a>
                    <a href="afficheradmin.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                   
                </div>
            </nav>
        </div>
        <div class="content">
<div class="container-xxl position-relative bg-white d-flex p-0">

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
                 <div class="publish-button2389">
                    
                </div>
                </form>
                </div>
             
              
                </div>
<!--                end of col-md-9 -->
</div>   

</div>

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
