<?php
class LeQuestion{
    private $RefQ=null;
    private  $TitreQ=null;
    private $DesQ=null;
    private  $Categ=null;
    private $Date_publication=null;
    private $QuestionStat=null;

  
    function __construct(string $TitreQ, string $DesQ,string $categ, string $Date_publication, string $QuestionStat){
			
        $this->TitreQ=$TitreQ;
        $this->DesQ=$DesQ;
        $this->categ=$categ;
        $this->Date_publication=$Date_publication;
    
     $this->QuestionStat=$QuestionStat;
       
    }

    function getRefQ(): int{
        return $this->RefQ;
    }
    function getTitreQ(): string{
        return $this->TitreQ;
    }
    function getDate_publication(): string{
        return $this->Date_publication;
    }
    function getDesQ(): string{
        return $this->DesQ;
    }
    
    function getcateg(): string{
        return $this->categ;
    }
  
    function getQuestionStat(): string{
        return $this->QuestionStat;
    }

    function setTitreQ(string $TitreQ): void{
        $this->TitreQ=$TitreQ;
    }
    function setDate_publication(string $Date_publication): void{
        $this->Date_publication;
    }
    function setContenuQ(string $ContenuQ): void{
        $this->ContenuQ=$ContenuQ;
    }
    function setcateg(string $categ): void{
        $this->categ=$categ;
    }
    
    function setDesQ(string $DesQ): void{
        $this->DesQ=$DesQ;
    }
    function setQuestionStat(string $QuestionStat): void{
        $this->QuestionStat=$QuestionStat;
    }

}
?>