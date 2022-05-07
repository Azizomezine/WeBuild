<?php
include "../controller/ReserverC.php";
include_once '../model/Reserver.php';
include_once("navbar.php"); 

$reserverC = new ReserverC();
$error = "";

if (
    isset($_POST["date_permis"]) &&
    isset($_POST["date_debut"]) &&
    isset($_POST["date_retour"]) &&
    isset($_POST["ville"])&&
    isset($_POST["idVoiture"])
) {
    if (
        !empty($_POST["date_permis"]) &&
        !empty($_POST["date_debut"]) &&
        !empty($_POST["date_retour"]) &&
        !empty($_POST["ville"])&&
        !empty($_POST["idVoiture"])
    ) {
        $reservation = new Reserver(
            $_POST['date_permis'],
            $_POST['date_debut'],
            $_POST['date_retour'],
            $_POST['ville'],
            $_POST['idVoiture']
        );

        $reserverC->modifierreservation($reservation, $_GET['id']);
        header('refresh:5;url=../trippie back/index2.php');
    } else
        $error = "Missing information";
}

?>
<html>

<head>
    <title>Modifier Utilisateur</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../views/include/ajouter.css" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
    </style>
       <script >
        function validateForm2() {
    var letters = /^[A-Za-z]+$/;
    var dateNow = new Date();
    var dp = document.getElementById("date_permis").value;
    var db = document.getElementById("date_debut").value;
    var dr = document.getElementById("date_retour").value;
    var vi = document.getElementById("ville").value;
    var errordp = document.getElementById('errorDp'); 
    var errordb = document.getElementById('errorDd'); 
    var errordr = document.getElementById('errorDr'); 
    var errorvi = document.getElementById('errorVi'); 


 if (new Date(dp).toLocaleString() > dateNow.toLocaleString()) {
errorDp.innerHTML = "la date permis  supeireur a date systeme  !" ;
return false ;
}

else if(new Date(db).toLocaleString() < dateNow.toLocaleString()) {
    errorDb.innerHTML= "la date debut inferieur a date systeme   !";
return false ;
}

else if(new Date(dr).toLocaleString() < dateNow.toLocaleString()) {
    errorDb.innerHTML="date retour est inferieur  a date systeme  !";
return false ;
}
else if ((new Date(dr).toLocaleString())<(new Date(db).toLocaleString()))
{
    errorDr.innerHTML="la date retour est inferieur a date debut  "; 
    return false ;
}
else if (vi == "") {
        errorVi.innerHTML = "Veuillez entrer ville !";
        return false;
}
        }

    </script>
    
 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="css/slick.css"/>
<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="css/style.css"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


</head>

<body>
    

    <div id="error">
        <?php echo $error; ?>
    </div>
    <button><a href="../views/liste.php">Retour à la liste</a></button>
    <hr>

    <?php
    if (isset($_GET['id'])) {
        $reservation = $reserverC->recupererreservation($_GET['id']);

    ?>
       
            <form action="" method="POST"name="f2"onSubmit="return validateForm2()" >
                <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
               
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<center><h3 class="title">modifier reservation</h3></center>
							</div>

                            <div class="form-group">
                <input type="text" name="id" id="id" value="<?php echo $reservation['Id']; ?>" disabled>
                            </div>
                            <div class="form-group">
                <input type="date" name="date_permis" id="date_permis"  value="<?php echo $reservation['Date_permis']; ?>">
                <p id="errorDp" class="error"></p>
                            </div>

                            <div class="form-group">
                <input type="date" name="date_debut" id="date_debut"  value="<?php echo $reservation['Date_debut']; ?>">
                <p id="errorDd" class="error"></p>
                            </div>
                            <div class="form-group">
                <input type="date" name="date_retour" id="date_retour" value="<?php echo $reservation['Date_retour']; ?>">
                <p id="errorDr" class="error"></p>
                            </div>
                            <div class="form-group">
                <input type="text" placeholder="ville" name="ville" id="ville" value="<?php echo $reservation['Ville']; ?>">
                <p id="errorDv" class="error"></p>
                            </div>
                            <div class="form-group">
                <input type="text" name="idVoiture" id="idVoiture" value="<?php echo $reservation['idVoiture']; ?>" disabled>
                            </div>
               
                    <pre> <input type="submit" value="Modifier" name = "modifer" class="primary-btn order-submit"> <input type="reset" value="Annuler" class="primary-btn order-submit" > </pre>
                    </div>
						<!-- /Billing Details -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

            </form>
    <?php
    }
    ?>
    	<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
</body>

</html>