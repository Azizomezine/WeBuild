<?PHP
	include "../config.php";
	require_once '../model/Voiture.php';

	class VoitureC {
		
		function ajoutervoiture($Voiture){
			$sql="INSERT INTO voiture (matricule, marque, prix, image) 
			VALUES (:matricule,:marque,:prix, :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'matricule' => $Voiture->getMatricule(),
					'marque' => $Voiture->getMarque(),
					'prix' => $Voiture->getPrix(),
					'image' => $Voiture->getImage(),
			
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affichervoiture(){
			
			$sql="SELECT * FROM voiture";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimervoiture($id){
			$sql="DELETE FROM voiture WHERE id= :id";
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
		function modifiervoiture($Voiture, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE voiture SET 
						matricule = :matricule, 
						marque = :marque,
						prix = :prix,
						image = :image
					WHERE id = :id'
				);
				$query->execute([
					'matricule' => $Voiture->getMatricule(),
					'marque' => $Voiture->getMarque(),
					'prix' => $Voiture->getPrix(),
					'image' => $Voiture->getImage(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperervoiture($id){
			$sql="SELECT * from voiture where id=$id";
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

		function recuperervoiture1($id){
			$sql="SELECT * from voiture where id=$id";
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