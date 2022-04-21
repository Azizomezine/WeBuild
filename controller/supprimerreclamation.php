<?php
include '../Model/reclamations.php';
include '../Controller/reclamationsc.php';
$reclamationsc = new reclamationsc();
	$reclamationsc->supprime_reclamations($_POST["num_reclamation"]);

?>