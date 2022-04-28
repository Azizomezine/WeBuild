<?PHP
    class le_categorie
    { // utilisateur = le reponse / user =reponse
	
		
		private  $ncateg = null;
		private  $descateg = null;
	
        function __construct(string $ncateg, string $descateg)
        {			
			$this->ncateg=$ncateg;
			$this->descateg=$descateg;
			
		}
        function getncateg(): string
        {
			return $this->ncateg;
		}
        function getdescateg(): string
        {
			return $this->descateg;
		}
	   function setncateg(string $ncateg): void{
			$this->ncateg=$ncateg;
		}
		function setdescateg(string $descateg): void{
			$this->descateg;
		}
		
	}
?>