<?PHP
	//include "../config.php";
	require_once '../Model/Categorie.php';

	class CategorieC {
		
		function ajouterCategorie($Categorie){
			$sql="INSERT INTO Categorie (ncateg,descateg )
			VALUES (:ncateg,:descateg)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'ncateg' => $Categorie->getncateg(),
					'descateg' => $Categorie->getdescateg()
					
				]);		
				echo "<meta http-equiv='refresh' content='0'>";	
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            		
		}
		
		public function affichertousCategorie()
		{
			$pdo =config::getConnexion();
			{
				try
				{
					$query = $pdo ->prepare (
						'select * FROM  categorie' );
					$query ->execute();
					$result = $query ->fetchAll(); 
					return $result;
				}catch(PDOExeption $e){
					$e->getMessage();
				}
			}
			
		}
		public function afficherCategorie($IdCfk)
		{
			$sql="SELECT * FROM reponse WHERE IdCfk= $IdCfk";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function recuperercateg($ncateg){
			$sql="select * from Categorie where ncateg like '".$ncateg."'  ";

			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Categorie=$query->fetch();
				return $Categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	/*	function recupereridcfk($ncateg){
			$sql="SELECT idC from categorie where ncateg=$ncateg";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Categorie=$query->fetch();
				return $Categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
*/
		function supprimerCategorie($IdCategorie){
			$sql="DELETE FROM Categorie WHERE idC= :idC";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idC',$IdCategorie);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }
		function supprimerCategorieadmin($RefQC){
			$sql="DELETE FROM Categorie WHERE RefQC= :RefQC";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':RefQC',$RefQC);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }

       
		function modifiercategorie($Categorie, $idC){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE categorie SET 
						ncateg= :ncateg, 
						descateg = :descateg
					WHERE idC = :idC'
                );
                
                $query->execute([
					'ncateg' => $Categorie->getncateg(),
					'descateg' => $Categorie->getdescateg(),
					 'idC'=>$idC
				]);		
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		
		function recupererCategorie($IdC){
			$sql="SELECT * from Categorie where idC=$IdC";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Categorie=$query->fetch();
				return $Categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function calculerReponse()
		{
		   $sql="SELECT COUNT(*)  from Categorie ";
		   $db = config::getConnexion();
		   try{
			   $query=$db->prepare($sql);
			   $query->execute();

			   $sum=$query->fetch();
			   return $sum;
		   }
		   catch (Exception $e){
			   die('Erreur: '.$e->getMessage());
		   }
		}
		function calculerReponseQuestion($RefQC)
		{
		   $sql="SELECT COUNT(*)  from Categorie where RefQC=$RefQC ";
		   $db = config::getConnexion();
		   try{
			   $query=$db->prepare($sql);
			   $query->execute();

			   $sum=$query->fetch();
			   return $sum;
		   }
		   catch (Exception $e){
			   die('Erreur: '.$e->getMessage());
		   }
		}
	}

?>