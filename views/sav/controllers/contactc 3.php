<?php
include "config.php";

class contactc {

	function ajoutercontact($contact)
	{

		$sql="insert into savcontact (nom,prenom,email,sujet,message) values (:nom,:prenom,:email,:sujet,:message)";

		$db = config::getConnexion();
 
		try {
        $req=$db->prepare($sql);


		$nom=$contact->getnom();
        $prenom=$contact->getprenom();
        $email=$contact->getemail();
        $sujet=$contact->getsujet();
        $message=$contact->getmessage();

        		$req->bindValue(':nom',$nom);


		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':sujet',$sujet);
		$req->bindValue(':message',$message);
		
            $req->execute();
           
           }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
      }


    }
	

?>