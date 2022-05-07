<?PHP
	include "../config.php";
	require_once '../model/Reserver.php';

	class ReserverC {
		
		function ajouterreservation($Voiture){
			$sql="INSERT INTO reserver (date_permis, date_debut, date_retour, ville,idvoiture ) 
			VALUES (:date_permis,:date_debut,:date_retour, :ville ,:idvoiture)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'date_permis' => $Voiture->getDate_permis(),
					'date_debut' => $Voiture->getDate_debut(),
					'date_retour' => $Voiture->getDate_retour(),
					'ville' => $Voiture->getVille(),
					'idvoiture' => $Voiture->getIdvoiture()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherreservation(){
			
			$sql="SELECT * FROM reserver";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerreservation($id){
			$sql="DELETE FROM reserver WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierreservation($Voiture, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reserver SET 
						date_permis = :date_permis, 
						date_debut = :date_debut,
						date_retour = :date_retour,
						ville = :ville
					WHERE id = :id'
				);
				$query->execute([
					'date_permis' => $Voiture->getDate_permis(),
					'date_debut' => $Voiture->getDate_debut(),
					'date_retour' => $Voiture->getDate_retour(),
					'ville' => $Voiture->getVille(),
				
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererreservation($id){
			$sql="SELECT * from reserver where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererreservation1($id){
			$sql="SELECT * from reserver where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recherchervoiture($Search){
			$sql="select * from voiture where Matricule like '".$Search."%' ";
			$db = config::getConnexion();
			try{
				$user=$db->query($sql);
				return $user;
			}
			catch (Exception $e){
				return $e->getMessage();
			}
		}
		
	}

?>