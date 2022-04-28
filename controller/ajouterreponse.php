<?php 
    include '../Controller/reponsec.php';
	include_once '../config.php';
    $error = "";


    $reponsec = new reponsesc();
    

    $date = date_create(date('Y-m-d H:i:s'));
            $reponse = new reponses(
                $_POST['description'], 
				$date,
                0,
                $_POST['num_reclamation']
            );
            $reponsec->ajouter_reponses($reponse);
       

        
            header('Location:../views/consulteruserreclamation.php');

    
?>

    