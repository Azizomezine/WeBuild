<?php
include "config.php";

class reviewc {

	function ajouterreview($review)
	{

		$sql="insert into review (nom,email,review,rating) values (:nom,:email,:review,:rating)";

		$db = config::getConnexion();
 
		try {
        $req=$db->prepare($sql);


		$nom=$review->getnom();
        $rating=$review->getrating();
        $email=$review->getemail();
        $review=$review->getreview();

        $req->bindValue(':nom',$nom);

		$req->bindValue(':email',$email);
		$req->bindValue(':rating',$rating);
		$req->bindValue(':review',$review);
		
            $req->execute();
           
           }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
      }


    function afficherreview ()
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From review";
        $db = config::getConnexion();
        try
        {
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }   
    }



    }
	

?>