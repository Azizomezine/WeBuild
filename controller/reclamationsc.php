
<?php
	include_once '../config.php';
	include_once '../Model/reclamations.php';

	class reclamationsc {
		function afficher_reclamations(){
			$sql="SELECT * FROM reclamations";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function trier_reclamations($ord){
			$sql='SELECT * FROM reclamations ORDER BY '.$ord;
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}




		function supprime_reclamations($num_reclamation){
			$sql="DELETE FROM reclamations WHERE num_reclamation=:num_reclamation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':num_reclamation', $num_reclamation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}







		function ajouter_reclamations($reclamations){
			$sql="INSERT INTO reclamations(sujet,description,date_reclamation,etat,id_client)
			 Values(:sujet,:description,:date_reclamation,:etat,:id_client)";
			 $stringDate = $reclamations->get_date_reclamation()->format('Y-m-d H:i:s');
			$db = config::getConnexion();
			try{
				
				$query = $db->prepare($sql);
				$query->execute([
                'sujet'=>$reclamations->get_sujet(),
                'description'=>$reclamations->get_description(),
                'date_reclamation'=>$stringDate,
                'etat'=>$reclamations->get_etat(),
                'id_client'=>$reclamations->get_id_client(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


		function modifier_reclamations($description,$num_reclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE reclamations SET 
						description= :description 
					WHERE num_reclamation= :num_reclamation"
				);
				$query->execute([
					'num_reclamation' => $num_reclamation,
					'description' => $description
				]);
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


		function archiver_reclamations($num_reclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE reclamations SET 
							etat= 3 
					WHERE num_reclamation= :num_reclamation"
				);
				$query->execute([
					'num_reclamation' => $num_reclamation,
				]);
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


		function desarchiver_reclamations($num_reclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE reclamations SET 
							etat= 1 
					WHERE num_reclamation= :num_reclamation"
				);
				$query->execute([
					'num_reclamation' => $num_reclamation,
				]);
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}






	
		function recuperer_reclamations($num_reclamation){
			$sql="SELECT * from reclamations LEFT JOIN reponses 	on (num_reclamation=num_question) where (num_reclamation=$num_reclamation)";
            $sql1="Update reclamations set etat = 1  where (num_reclamation=$num_reclamation )&& (etat!=3)";
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
		





	}
?>