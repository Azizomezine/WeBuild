<?PHP
include "../controller/VoitureC.php";
include_once("navbar.php");

$voitureC = new VoitureC();
$listevoitures = $voitureC->affichervoiture();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Electro - HTML Ecommerce Template</title>
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
		<style>
			.mini_img {
			width: 300px;
			height: auto;
		}
			</style>
</head>
<body>
	
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store products -->
					<div class="row">
					<?PHP
	foreach ($listevoitures as $voiture) {
	?>
					<center>	<div class="col-md-4 col-xs-6">

							<div class="product">
	
								<div class="product-img">
			<img src="include/<?PHP echo $voiture['Image']; ?>" alt="image" class="mini_img">
								</div>
								<div class="product-body">
									<p class="product-category"><?PHP echo $voiture['Marque']; ?></p>
									<h4 class="product-price"><?PHP echo $voiture['Prix']; ?></h4>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>
									<a href="../views/ajouterreservation.php">reserver </a></button>
								</div>
							</div>
						</div>
					</center>
						<?PHP
	}
	?>
						<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>
						<div class="clearfix visible-sm visible-xs"></div>
					</div>
					<!-- /store products -->
					<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>

	<!-- /SECTION -->
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>