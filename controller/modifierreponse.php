<?php 
    include '../Controller/reponsec.php';
	include_once '../config.php';

    $reponsec = new reponsesc();
    

    if($_POST['num_reponse']!=null){
        $reponsec->modifier_reponses($_POST['description'], $_POST['num_reponse']);
   

    }

       

        
            header('Location:../views/consulteruserreclamation.php');

    
?>

    