<?php
include '../config.php';
require_once '../model/Question.php';

class QuestionC {

   

public function ajouterquestion($Question)
    {
		$sql="INSERT INTO question (TitreQ, DesQ,Category, Date_publication, QuestionStat,IdCfk,userfk) 
		VALUES (:TitreQ,:DesQ,:Category, :Date_publication , :QuestionStat  ,:IdCfk,:userfk)";
		$db = config::getConnexion();
		try{
			$query = $db->prepare($sql);
		
			$query->execute([
				'TitreQ' => $Question->getTitreQ(),
				'DesQ' => $Question->getDesQ(),
				'Category' => $Question->getCateg(),
				'Date_publication' => $Question->getDate_publication(),
				'QuestionStat' => $Question->getQuestionStat(),'IdCfk' =>$Question->getIdCfk(),'userfk'=>$Question->getuserfk()
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
                         'select * FROM  question ORDER BY RefQ  DESC LIMIT 0,2' );
                     $query ->execute();
                     $result = $query ->fetchAll(); 
                     return $result;
                 }catch(PDOExeption $e){
                     $e->getMessage();
                 }
             }
         }

		 public function afficherallquestion()
         {
             $pdo =config::getConnexion();
             {
                 try
                 {
                     $query = $pdo ->prepare (
                         'select * FROM  question ORDER BY RefQ  ' );
                     $query ->execute();
                     $result = $query ->fetchAll(); 
                     return $result;
                 }catch(PDOExeption $e){
                     $e->getMessage();
                 }
             }
         }
	 function calculerQuestion()
         {
			$sql="SELECT COUNT(*)  from question ";
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
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerQuestioncateg($idc){
			$sql="DELETE FROM question WHERE IdCfk=:IdCfk";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdCfk', $idc);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
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
public function detailquestioncateg($idC)
		{
		
		$pdo =config::getConnexion();
		{
			try
			{
				$query = $pdo ->prepare (
					"select * FROM  question WHERE IdCfk='".$idC."' ORDER BY RefQ  " );
				$query ->execute();
				$result = $query ->fetchAll(); 
				return $result;
			}catch(PDOExeption $e){
				$e->getMessage();
			}
		}
		}
		public function questionuser($userfk)
		{
		
		$pdo =config::getConnexion();
		{
			try
			{
				$query = $pdo ->prepare (
					"select * FROM  question WHERE userfk='".$userfk."' ORDER BY userfk  " );
				$query ->execute();
				$result = $query ->fetchAll(); 
				return $result;
			}catch(PDOExeption $e){
				$e->getMessage();
			}
		}
		}
function rechercherQuestion($Search){
	$sql="select * from question where TitreQ like '%".$Search."%' or Category like '".$Search."%' or DesQ like '%".$Search."%' ";
	$db = config::getConnexion();
	try{
		$liste=$db->query($sql);
		return $liste;
	}
	catch (Exception $e){
		return $e->getMessage();
	}
}       
function rechercherQuestionMeilleur($Search){
	$sql="select * from question where TitreQ like '".$Search."%' or Category like '".$Search."%' or DesQ like '".$Search."%' ORDER BY RefQ  DESC LIMIT 0,5";
	$db = config::getConnexion();
	try{
		$liste=$db->query($sql);
		return $liste;
	}
	catch (Exception $e){
		return $e->getMessage();
	}
} 
/*function hate_bad($bads)
{$bads = array();
	$file_array = file('C:/xampp/htdocs/WeBuild-utilisateurs/View/bad_words.txt',FILE_IGNORE_NEW_LINES);
foreach ($file_array as $word_combo) {
    $bads[] = explode(',', $word_combo);
}
    return $bads;
}*/  
function BadWordFilter($text){
$pattern='/(fuck|cunt|shit|poop|putain|zut|Merde)/i';
$remplacement="****";
$good=preg_replace($pattern,$remplacement,$text);
	return $good;   
}}
?>
