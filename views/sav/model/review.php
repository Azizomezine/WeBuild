<?PHP

class review 
{


	private $nom;
	private $email;
	private $review;
	private $rating;

	function __construct($nom,$email,$review,$rating)
				{
		$this->nom=$nom;
		$this->email=$email;
		$this->review=$review;
		$this->rating=$rating;
				}
	
	function getnom(){
		return $this->nom;
	}

	function getemail(){
		return $this->email;
	}
	function getreview(){
		return $this->review;
	}
	function getrating(){
		return $this->rating;
	}


	
}

?>