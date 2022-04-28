<?php 
    include '../Model/reclamations.php';
    include '../Controller/reclamationsc.php';

    $reclamationsc = new reclamationsc();
    

    if($_COOKIE['currentnum']!=null){
        $reclamationsc->desarchiver_reclamations($_COOKIE['currentnum']);
   

    }

       

        
         header('Location:../views/consulteruserreclamation.php');

    
?>
