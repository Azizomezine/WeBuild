<?PHP
	class Voiture{
		private ?int $id = null;
		private ?string $matricule = null;
		private ?string $marque = null;
		private ?string $prix = null;
		private ?string $image = null;

		
		function __construct(string $matricule, string $marque, string $prix, string $image){
			
			$this->matricule=$matricule;
			$this->marque=$marque;
			$this->prix=$prix;
			$this->image=$image;
		
		}
		
		function getId(): int{
			return $this->id;
		}
		function getMatricule(): string{
			return $this->matricule;
		}
		function getMarque(): string{
			return $this->marque;
		}
		function getImage(): string{
			return $this->image;
		}
		function getPrix(): string{
			return $this->prix;
		}
		

		function setMatricule(string $matricule): void{
			$this->matricule=$matricule;
		}
		function setMarque(string $marque): void{
			$this->marque;
		}
		function setImage(string $image): void{
			$this->image=$image;
		}
		function setPrix(string $prix): void{
			$this->prix=$prix;
		}
	
	}
?>