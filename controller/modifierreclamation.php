<?php
    include '../Model/reclamations.php';
    include '../Controller/reclamationsc.php';



    $reclamationsc = new reclamationsc();


            $reclamationsc->modifier_reclamations($_POST['description'], intval($_POST['num_reclamation']));
       

        

    


    
?>