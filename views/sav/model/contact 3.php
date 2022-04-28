<?PHP

class contact 
{


	private $nom;
	private $prenom;
	private $email;
	private $sujet;
	private $message;

	function __construct($nom,$prenom,$email,$sujet,$message)
				{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->sujet=$sujet;
		$this->message=$message;
				}
	
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getemail(){
		return $this->email;
	}
	function getsujet(){
		return $this->sujet;
	}
	function getmessage(){
		return $this->message;
	}

function setnom($nom)
{
	$this->nom=$nom;
}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setsujet($sujet){
		$this->sujet=$sujet;
	}
	function setmessage($message){
		$this->message=$message;
	}
	
}

?>