<?php
    include '../Model/reclamations.php';
    include '../Controller/reclamationsc.php';



    $reclamationsc = new reclamationsc();

if($_POST['num_reclamation']!=null){
            $reclamationsc->modifier_reclamations($_POST['description'], $_POST['num_reclamation']);
       

        }

    


    
?>