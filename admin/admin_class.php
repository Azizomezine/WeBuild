<?php

Class Action {
	private $db;

	public function __construct() {
		ob_start();

		include_once('db_connect.php');
		$pdo= config::getConnexion();
    $this->db = $pdo;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->rowCount() > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
		if($qry->rowCount() > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = 3";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->rowCount();
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
			if($qry->rowCount() > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
			}
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../views/assets/img/downloaded'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->rowCount() > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	
	function save_airlines(){
		extract($_POST);
		$data = " airlines = '$airlines' ";
		if(!empty($_FILES['img']['tmp_name'])){
			$fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], '../assets/img/'.$fname);
			if($move){
				$data .=", logo_path = '$fname' ";
			}
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO airlines_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE airlines_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_airlines(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM airlines_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_airports(){
		extract($_POST);
		$data = " airport = '$airport' ";
		$data .= ", location = '$location' ";
		
		if(empty($id)){
			$save = $this->db->query("INSERT INTO airport_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE airport_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_airports(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM airport_list where id = ".$id);
		if($delete)
			return 1;
	}
	function delete_booked(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM booked_flight where id = ".$id);
		if($delete)
			return 1;
	}
	function save_flight(){
		extract($_POST);
		$data = " airline_id = '$airline' ";
		$data .= ", plane_no = '$plane_no' ";
		$data .= ", departure_airport_id = '$departure_airport_id' ";
		$data .= ", arrival_airport_id = '$arrival_airport_id' ";
		$data .= ", departure_datetime = '$departure_datetime' ";
		$data .= ", arrival_datetime = '$arrival_datetime' ";
		$data .= ", seats = '$seats' ";
		$data .= ", price = '$price' ";
		
		if(empty($id)){
			// echo "INSERT INTO flight_list set ".$data;
			$save = $this->db->query("INSERT INTO flight_list set ".$data);
			
		}else{
			$save = $this->db->query("UPDATE flight_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_flight(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM flight_list where id = ".$id);
		if($delete)
			return 1;
	}
	function book_flight(){
		extract($_POST);
		foreach ($name as $k => $value) {
			$data = " flight_id = $flight_id ";
			$data .= " , name = '$name[$k]' ";
			$data .= " , address = '$address[$k]' ";
			$data .= " , contact = '$contact[$k]' ";

			$save[] = $this->db->query("INSERT INTO booked_flight set ".$data);
		
		}
		if(isset($save))
		{	return 1;
			
		}
		
	}
	function update_booked(){
		extract($_POST);
			$data = "  name = '$name' ";
			$data .= " , address = '$address' ";
			$data .= " , contact = '$contact' ";

			if(empty($id)){
				
				$save = $this->db->query("INSERT INTO booked_flight set ".$data);
			}else{
			$save= $this->db->query("UPDATE booked_flight set ".$data." where id =".$id);
		if($save)
			return 1;
	}
      }
	  function qrpr($i,$n,$p){
		$tempDir = "qrcodes/";
		
		
		

		$codeContents = $i;
		$codeContents .= $n;
		$codeContents .= $p;
	/*	$codeContents .= $q; */

		
		// we need to generate filename somehow, 
		// with md5 or with database ID used to obtains $codeContents...
		$fileName = '005_file_'.md5($codeContents).'.png';
		
		$pngAbsoluteFilePath = $tempDir.$fileName;
		$urlRelativeFilePath = $tempDir.$fileName;
		
		// generating
		if (!file_exists($pngAbsoluteFilePath)) {
			$save = QRcode::png($codeContents, $pngAbsoluteFilePath);
			
		} 
		
		
		// displaying
		echo '<img src="'.$urlRelativeFilePath.'" />';
	}

	  /*function mailticket(){
		$mail = new PHPMailer; 
		"name = '$name'" ;
		" , address = '$address' ";
		" , contact = '$contact' ";

		
		$name=$cmd->getnom();
		$prenomM=$cmd->getprenom();
		$emailm=$cmd->getemail();
		$numm=$cmd->getnum();
		$numcm=$cmd->getnum_c();
		$cvvm=$cmd->getcvv();
	 
	$mail->isSMTP();                      // Set mailer to use SMTP 
	$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
	$mail->SMTPAuth = true;               // Enable SMTP authentication 
	$mail->Username = 'projetweb770@gmail.com';   // SMTP username 
	$mail->Password = '123456web';   // SMTP password 
	$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
	$mail->Port = 587;                    // TCP port to connect to 
	 
	// Sender info 
	$mail->setFrom('projetweb770@gmail.com'); 
	$mail->addReplyTo('projetweb770@gmail.com'); 
	 
	// Add a recipient 
	  $mail->addAddress($cmd->getemail()"projetweb770@gmail.com"); 
	 
	//$mail->addCC('cc@example.com'); 
	//$mail->addBCC('bcc@example.com'); 
	  $mail->Body =" this is plain text email body " ;
	// Set email format to HTML 
	$mail->isHTML(true); 
	 
	// Mail subject 
	$mail->Subject = 'Votre ticket de voyage'; 
	 
	// Mail body content 
	$bodyContent = '<html><body>';
	$bodyContent .= '<h1 style="color:#f40;">Votre voyage : </h1>'; 
	$bodyContent .= '<h4 style="color:#dc143c;">Nom : </h4> '; 
	$bodyContent .=   $name ; 
	$bodyContent .= '<h4 style="color:#dc143c;">Prenom : </h4> '; 
	$bodyContent .=   $address ;
	$bodyContent .= '<h4 style="color:#dc143c;">Prenom : </h4> '; 
	$bodyContent .=   $contact ; 
	
	$bodyContent .= '<h4 style="color:#dc143c;">email : </h4> '; 
	$bodyContent .=   $emailm ; 
	$bodyContent .= '<h4 style="color:#dc143c;">numéro téléphone : </h4> '; 
	$bodyContent .=   $numm ; 
	$bodyContent .= '<h4 style="color:#dc143c;">numéro carte : </h4> '; 
	$bodyContent .=   $numcm ;
	$bodyContent .= '<h4 style="color:#dc143c;">cvv : </h4> '; 
	$bodyContent .=   $cvvm ;
	$bodyContent .= '<html><body>';
	$mail->Body    = $bodyContent;  
	$save =$mail->send() ;
	// Send email 
	if(!$save) { 
		echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
	} else { 

		echo 'Message has been sent.'; 
	} 
		 } */

		
}

?>