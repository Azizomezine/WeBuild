<?php
include_once '../model/Reserver.php';
include_once '../controller/ReserverC.php';
include_once("navbar.php");

$error = "";

// create user
$reservation = null;

// create an instance of the controller
$reserverC = new ReserverC();
if (
	isset($_POST["date_permis"]) &&
	isset($_POST["date_debut"]) &&
	isset($_POST["date_retour"]) &&
	isset($_POST["ville"]) &&
	isset($_POST["idVoiture"])
) {
	if (
		!empty($_POST["date_permis"]) &&
		!empty($_POST["date_debut"]) &&
		!empty($_POST["date_retour"]) &&
		!empty($_POST["ville"]) &&
		!empty($_POST["idVoiture"])
	) {
		$reservation = new Reserver(
			$_POST['date_permis'],
			$_POST['date_debut'],
			$_POST['date_retour'],
			$_POST['ville'],
			$_POST['idVoiture']

		);
		$reserverC->ajouterreservation($reservation);
		header('Location:../views/store 2.php');
	} else
		$error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>reservation Display</title>
	<style>
		.error {
			color: red;
		}
	</style>
	<script>
		function validateForm2() {
			var letters = /^[A-Za-z]+$/;
			var dateNow = new Date();
			var dp = document.getElementById("date_permis").value;
			var db = document.getElementById("date_debut").value;
			var dr = document.getElementById("date_retour").value;
			var vi = document.getElementById("ville").value;
			var id = document.getElementById("idVoiture").value;
			var errordp = document.getElementById('errorDp');
			var errordb = document.getElementById('errorDd');
			var errordr = document.getElementById('errorDr');
			var errorvi = document.getElementById('errorVi');
			var errorid = document.getElementById('errorId');
			if (new Date(dp).toLocaleString() < dateNow.toLocaleString()) {
				errordp.innerHTML = "La date de permis est inferieur  la date actuelle";
			}
			else if (vi == "") {
				errorvi.innerHTML = "la ville est vide   !";
				return false;
			}
		else 	if ((id == "") || (isNaN(id) == true)) {
				errorid.innerHTML = "confirmer le numero   !";
				return false;
			}
		else 	if (new Date(dp).toLocaleString() < dateNow.toLocaleString()) {
				errordp.innerHTML = "La date de permis est inferieur  la date actuelle";
				return false ; 
			}/* else 	if (new Date(db).toLocaleString() > dateNow.toLocaleString()) {
				errordb.innerHTML = "il faut que la date est superieure a date systeme";
				return false ; 
			}
			else if (new Date(db).toLocaleString()>new Date(dr).toLocaleString()){
				errordb.innerHTML = "il faut que la date est superieure a date systeme";
				return false ;
			}*/
		}
	
	</script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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
	<form action="" method="POST" name="f2" onSubmit="return validateForm2()">
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
								<center>
									<h3 class="title">reserver votre voiture</h3>
								</center>
							</div>
							<div class="form-group">
								<label> Date permis</label>
								<input class="input" type="date" name="date_permis" id="date_permis" placeholder="date_permis">
								<p id="errorDp" class="error"></p>
							</div>
							<div class="form-group">
								<label> Date Début de location</label>
								<input class="input" type="date" name="date_debut" id="date_debut" placeholder="date_debut">
								<p id="errorDb" class="error"></p>
							</div>
							<div class="form-group">
								<label> Date fin de location</label>
								<input class="input" type="date" name="date_retour" id="date_retour" placeholder="date_retour">
								<p id="errorDr" class="error"></p>
							</div>
							<div class="form-group">
								<label>Adresse </label>
								<input class="input" type="text" name="ville" id="ville">
								<p id="errorVi" class="error"></p>
							</div>
							<div class="form-group">
								<label> confirmer le numero du voiture </label>
								<input class="input" type="text" name="idVoiture" id="idVoiture">
								<p id="errorId" class="error"></p>

							</div>
							<input type="submit" value="envoyer" class="primary-btn order-submit">
							<a href="../views/store 2.php" class="primary-btn order-submit">annuler</a>


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





	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>