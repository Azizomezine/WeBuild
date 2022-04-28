
<?php

	include_once '../Model/reponse.php';
	class reponsesc {
		function afficher_reponses(){
			$sql="SELECT * FROM reponses";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}




		function supprime_reponses($num_reponse){
			$sql="DELETE FROM reponses WHERE num_reponse=:num_reponse";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':num_reponse', $num_reponse);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}







		function ajouter_reponses($reponse){
			$sql="INSERT INTO reponses(descriptions,date_reponse,etats,num_question)
			 Values(:descriptions,:date_reponse,:etats,:num_question)";
			 $stringDate = $reponse->get_date_reponse()->format('Y-m-d H:i:s');
			$db = config::getConnexion();
			try{
				
				$query = $db->prepare($sql);
				$query->execute([
                'descriptions'=>$reponse->get_description(),
                'date_reponse'=>$stringDate,
                'etats'=>0,
                'num_question'=>$reponse->get_num_question(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}





		/*function recuperer_reclamations($num_reclamation){
			$sql="SELECT * from reclamations where num_reclamation=$num_reclamation";
            $sql1="Update reclamations set etat = 1  where num_reclamation=$num_reclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
            try{
				$query1=$db->prepare($sql1);
				$query1->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
*/		


function modifier_reponses($description,$num_reponse){
	try {
		$db = config::getConnexion();
		$query = $db->prepare(
			"UPDATE reponses SET 
				descriptions= :description 
			WHERE num_reponse= :num_reponse"
		);
		$query->execute([
			'num_reponse' => $num_reponse,
			'description' => $description
		]);
	} catch (PDOException $e) {
		$e->getMessage();
	}
}


	}
?>