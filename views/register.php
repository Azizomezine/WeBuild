<?php 


include '../controller/utilisateurC.php';
include '../model/utilisateur.php';


$usersC=new usersC();
$s=0;  
if(
	isset($_POST['image'])&&
isset($_POST['nom'])&& isset($_POST['prenom']) && 
isset($_POST['adresse'])&&
isset($_POST['email'])&&
isset($_POST['age'])
&&
isset($_POST['gsm'])
&&
isset($_POST['username'])
&&
isset($_POST['password'])
&&
isset($_POST['role'])
)

{
    $users=new users(
		$_POST['image'],
$_POST['nom'],
$_POST['prenom'],
$_POST['age'],
$_POST['username'],
$_POST['adresse'],
$_POST['gsm'],
 $_POST['email'],

($_POST['password']),
$_POST['role']

);
 


 
 $s=1;
}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/
     4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src=
    "https://ajax.googleapis.com/ajax/libs/
     jquery/3.3.1/jquery.min.js">
    </script>
    <!-- Popper JS -->
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/
     popper.js/1.12.9/umd/popper.min.js">
    </script>
    <!-- Latest compiled JavaScript -->
    <script src=
    "https://maxcdn.bootstrapcdn.com/bootstrap/
     4.0.0/js/bootstrap.min.js">
    </script>
	

	<link rel="stylesheet" type="text/css" href="stylezaw.css">
	
	<title>Register Form</title>
	<script>
		 function validateForm() {
      var nom=document.getElementById("nom").value;
	  var prenom=document.getElementById("prenom").value;
	  var username=document.getElementById("username").value;
	  var email=document.getElementById("email").value;
	  var gsm=document.getElementById("gsm").value;
	  
	  if ((nom.charAt(0)<"A") ||  (nom.charAt(0)>"Z") || (prenom.charAt(0)<"A") || (prenom.charAt(0)>"Z")){
        errornom.innerHTML = "The first character must be uppercase !";
          return false;
      }
	 else  if(isNaN(gsm.charAt(0) )==true)
	 {
		errorgsm.innerHTML = "GSM must be only numbers !";
		return false;
	 }
	 else if((username.charAt(0)<"A") || (username.charAt(0)>"Z"))
	 {
		 errorusername="The first character must be uppercase ! "
		return false;
	 }
	
	 
	}
  </script>
</head>

<body>





	<div class="container">
	<form action="" method="POST" class="login-email" onSubmit="return validateForm()">
	     

		   <div class="input-group">
		   <input type="text" placeholder="image" name="image"  required>
		   </div>
		   <table>
			   <tr>
				   <td>
		   <div class="input-group">
			   <input type="text" placeholder="Name" name="nom" id="nom" required>
			   
		
		   </div></td>
		   <td>
		   <div class="input-group">
			   <input type="text" placeholder="Lastname" name="prenom"  id="prenom" required>
		   </div>
		</td>
		
		   </tr>
		   <p id="errornom" class="error"></p>
		   <tr>
		   <td>
			 <div class="input-group">
			   <input type="number" placeholder="Age" name="age" min="16" max="99" required>Years old
		   
			   </div>
		 </td>
		 
		 <td>
		   <div class="input-group">
			 <input type="text" placeholder="GSM"name="gsm" maxlength="8" id="gsm" required>
			 <p id="errorgsm" class="error"></p>
		   </div></td>
		 </tr>
		   </table>
		   <div class="input-group">
			   <input type="text" placeholder="Adresse" name="adresse"  required>
		   </div>
		   <div class="input-group">
			   <input type="text" placeholder="Username" name="username" id="username" required>
			   <p id="erroremail" class="error"></p>
			  
		   </div>
		   
		   <div class="input-group">
			   <input type="email" placeholder="Email" name="email" class="form-control" id="email" required>
			   
		   </div>
		   <div class="input-group">
			   <input type="password" placeholder="Password" name="password"  id="password"required>
			   
		   </div>
		 
				   </table>
				
<div>		
<select name="role" id="role">
<option value="" selected disabled >Choose your role</option >
	<option value="client">Customer</option>
	<option value="admin">Admin</option>
</select></div>
<br>
<br>
		
			<div class="input-group">
				
				<button name="submit" value="submit" class="submitbtn"  >Register</button>
				
			</div>
		
			<p class="login-register-text">Have an account? <a href="connexion.php">Login Here</a>.</p>
			
		</form>

	</div>
	<?php if($s==1)
{
	
$usersC->addUser($users);
header('Location:connexion.php');
}
?>  
<!--  Including app.js jQuery Script -->
<script language="javascript" type="text/javascript" src="../main.js"></script>
</body>
</html>

<style>

	  html,body{
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background: #F1F3F4;
  }
  div[class="container"]
  {
	  margin-top:20%;
  }
	button{
		font-family: 'Poppins', sans-serif;
    border-color: #1A73E8;
    
	width: 100%;
	
	margin-bottom: 6%;
    place-items: center;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #1A73E8;
	transform: translateY(-5px);
    border-radius: 6px;
    font-size: 1.2rem;
	
    color: #FFFF;
    cursor: pointer;
    transition: .3s;
	}

	input[class=age]
	{
		width:50%;
	}
	input[class=email]
	{
		margin-top:10%;
	}
.error-message{
color:#ff5b5b;
display:inline;	
display:none;
}

</style>