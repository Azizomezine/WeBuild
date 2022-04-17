<?php
include '../config.php';
require_once '../model/Question.php';

class QuestionC {

   

public function ajouterquestion($Question)
    {
		$sql="INSERT INTO question (TitreQ, DesQ,Category, Date_publication, QuestionStat ) 
		VALUES (:TitreQ,:DesQ,:Category, :Date_publication , :QuestionStat )";
		$db = config::getConnexion();
		try{
			$query = $db->prepare($sql);
		
			$query->execute([
				'TitreQ' => $Question->getTitreQ(),
				'DesQ' => $Question->getDesQ(),
				'Category' => $Question->getCateg(),
				'Date_publication' => $Question->getDate_publication(),
				'QuestionStat' => $Question->getQuestionStat()
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
		
		function modifierquestion($Question, $RefQ){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE question SET 
						TitreQ = :TitreQ, 
						DesQ = :DesQ,
						Category = :Category,
						Date_publication = :Date_publication,
						QuestionStat  = :QuestionStat 
					WHERE RefQ = :RefQ'
                );
                
                $query->execute([
					'TitreQ' =>$Question->getTitreQ(),
					'DesQ' => $Question->getDesQ(),
					'Category' => $Question->getCateg(),
					'Date_publication' => $Question->getDate_publication(),
					'QuestionStat' => $Question->getQuestionStat() ,'RefQ'=>$RefQ
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
		public function detailquestion($RefQ)
{
$sql ="SELECT *FROM Question WHERE RefQ =$RefQ";
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
