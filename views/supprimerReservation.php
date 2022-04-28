<?PHP
	include "../controller/ReserverC.php";

	$reserverC=new ReserverC();
	
	if (isset($_POST["id"])){
		$reserverC->supprimerreservation($_POST["id"]);
		header('Location:../trippie back/index2.php');
	}

?>