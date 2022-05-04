<?PHP
	//include "../config.php";
	require_once '../model/Reponse.php';
include 'QuestionC.php';
	class reponseC {
		
		function ajouterreponse($reponse){
			$sql="INSERT INTO reponse (Contentreponse,DatePublication,RefQC,userfk) 
			VALUES (:Contentreponse,:DatePublication,:RefQC,:userfk)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'Contentreponse' => $reponse->getContentreponse(),
					'DatePublication' => $reponse->getDatePublicationreponse(),
					'RefQC'=>$reponse->getRefQC(),'userfk'=>$reponse->getuserfk()
				]);		
				echo "<meta http-equiv='refresh' content='0'>";	
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
            		
		}
		
		function afficherreponse($RefQC){

			$sql="SELECT * FROM reponse WHERE RefQC= $RefQC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		public function affichertousreponse()
		{
			$pdo =config::getConnexion();
			{
				try
				{
					$query = $pdo ->prepare (
						'select * FROM  reponse' );
					$query ->execute();
					$result = $query ->fetchAll(); 
					return $result;
				}catch(PDOExeption $e){
					$e->getMessage();
				}
			}
		}
		function supprimerreponse($Idreponse){
			$sql="DELETE FROM reponse WHERE Idreponse= :Idreponse";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Idreponse',$Idreponse);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }
		function supprimerreponseadmin($RefQC){
			$sql="DELETE FROM reponse WHERE RefQC= :RefQC";
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

       


		function modifierreponse($Reponse, $Idreponse){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reponse SET 
						Contentreponse= :Contentreponse, 
						DatePublication = :DatePublication,	
						RefQC= :RefQC
					WHERE Idreponse = :Idreponse'
                );
                
                $query->execute([
					'Contentreponse' => $Reponse->getContentreponse(),
					'DatePublication' => $Reponse->getDatePublicationreponse(),
					'RefQC'=>$Reponse->getRefQC(),
					 'Idreponse'=>$Idreponse
				]);		
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererreponse($Idreponse){
			$sql="SELECT * from reponse where Idreponse=$Idreponse";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Reponse=$query->fetch();
				return $Reponse;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function calculerReponse()
		{
		   $sql="SELECT COUNT(*)  from reponse ";
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
		   $sql="SELECT COUNT(*)  from reponse where RefQC=$RefQC ";
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
		public function detailreponse($Idreponse)
		{
		$sql ="SELECT *FROM reponse WHERE Idreponse=$Idreponse";
		$pdo = config :: getConnexion();
		
			try{
			$query =$pdo->prepare($sql);
			$query ->execute();
		
			$Question =$query->fetch();
			return $Question;
		
			}catch (PDOException $e)
			{
			$e ->getMessage();
			}   
		}
	}

?>