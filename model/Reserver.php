<?PHP
	class Reserver{
		private ?int $id = null;
		private ?string $date_permis = null;
		private ?string $date_debut = null;
		private ?string $date_retour = null;
		private ?string $ville = null;
		
		function __construct(string $date_permis, string $date_debut, string $date_retour, string $ville){
			
			$this->date_permis=$date_permis;
			$this->date_debut=$date_debut;
			$this->date_retour=$date_retour;
			$this->ville=$ville;
		
		}
		
		function getId(): int{
			return $this->id;
		}
		function getDate_permis(): string{
			return $this->date_permis;
		}
		function getDate_debut(): string{
			return $this->date_debut;
		}
		function getVille(): string{
			return $this->ville;
		}
		function getDate_retour(): string{
			return $this->date_retour;
		}
		

		function setDate_permis(string $date_permis): void{
			$this->date_permis=$date_permis;
		}
		function setDate_debut(string $date_debut): void{
			$this->date_debut;
		}
		function setVille(string $ville): void{
			$this->ville=$ville;
		}
		function setDate_retour(string $date_retour): void{
			$this->date_retour=$date_retour;
		}
		
	}
?>