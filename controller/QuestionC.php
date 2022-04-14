<?php
include '../config.php';
require_once '../model/Question.php';

class QuestionC {

   

public function ajouterquestion($Question)
    {
		$sql="INSERT INTO question (TitreQ, DesQ,Category, ContenuQ, Date_publication, QuestionStat ) 
		VALUES (:TitreQ,:DesQ,:Category,:ContenuQ, :Date_publication , :QuestionStat )";
		$db = config::getConnexion();
		try{
			$query = $db->prepare($sql);
		
			$query->execute([
				'TitreQ' => $Question->getTitreQ(),
				'DesQ' => $Question->getDesQ(),
				'Category' => $Question->getCateg(),
				'ContenuQ' => $Question->getCateg(),
				'Date_publication' => $Question->getDate_publication(),
				'QuestionStat' => $Question->getDate_publication()
			]);			
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}
         }

     public function afficherquestion()
         {
             $pdo =config::getConnexion();
             {
                 try
                 {
                     $query = $pdo ->prepare (
                         'select * FROM  question' );
                     $query ->execute();
                     $result = $query ->fetchAll(); 
                     return $result;
                 }catch(PDOExeption $e){
                     $e->getMessage();
                 }
             }
         }
         function recupererQuestion($RefQ){
			$sql="SELECT * from question where RefQ=$RefQ";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Question=$query->fetch();
				return $Question;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierQuestion($Question, $RefQ)
		{
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE question SET 
							DesQ= :DesQ, 
							TitreQ= :TitreQ, 
							ContenuQ= :ContenuQ, 
						WHERE RefQ= :RefQ'
				);
				$query ->execute(['RefQ' => $RefQ,
					'DesQ'=>$Question->get_DesQ(),
					'TitreQ'=>$Question->get_TitreQ(),
					'ContenuQ'=>$Question->get_ContenuQ(),
					'Date_publication'=>date('d/m/Y')
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
        function supprimerQuestion($RefQ){
			$sql="DELETE FROM question WHERE RefQ=:RefQ";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':RefQ', $RefQ);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

}
?>
