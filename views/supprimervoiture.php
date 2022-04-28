<?PHP
	include "../controller/VoitureC.php";

	$voitureC=new VoitureC();
	
	if (isset($_POST["id"])){
		$voitureC->supprimervoiture($_POST["id"]);
		header('Location:../trippie back/index.php');
	}

?>