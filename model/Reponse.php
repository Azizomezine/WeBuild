<?PHP
    class le_reponse
    { // utilisateur = le reponse / user =reponse
		private  $Idreponse = null;
		private $RefQC=null;
		private  $Contentreponse = null;
		private  $DatePublicationreponse = null;
	  
        function __construct(string $Contentreponse, string $DatePublicationreponse,int $RefQC)
        {			
			$this->Contentreponse=$Contentreponse;
			$this->DatePublicationreponse=$DatePublicationreponse;
			$this->RefQC=$RefQC;
		}

        function getIdreponse(): int
        {
			return $this->Idreponse;
		}
		function getRefQC(): int
        {
			return $this->RefQC;
		}
        function getContentreponse(): string
        {
			return $this->Contentreponse;
		}
        function getDatePublicationreponse(): string
        {
			return $this->DatePublicationreponse;
		}
	   function setContentreponse(string $Contentreponse): void{
			$this->Contentreponse=$Contentreponse;
		}
		function setDatePublicationreponse(string $DatePublicationreponse): void{
			$this->DatePublicationreponse;
		}
		
	}
?>