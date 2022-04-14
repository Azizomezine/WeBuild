<?php
    include '../Model/reclamations.php';
    include '../Controller/reclamationsc.php';

    $error = "";
    // create adherent

    $reclamationsc = new reclamationsc();
    date("Y-m-d h:i:sa", $d);
    $date = date_create($_POST['date_reclamtion']);

            $reclamations = new reclamations(
				$_POST['sujet'],
                $_POST['description'], 
				$date
,
                intval( $_POST['etat']),
                intval($_POST['id_client'])
            );
            $reclamationsc->ajouter_reclamations($reclamations);

        

    


    
?>
