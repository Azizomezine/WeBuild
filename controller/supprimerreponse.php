<?php
	include_once '../config.php';
include '../Model/reponse.php';
include '../Controller/reponsec.php';
$reponsesc = new reponsesc();

	$reponsesc->supprime_reponses($_COOKIE['num']);

    header('Location:../views/consulteruserreclamation.php');
?>