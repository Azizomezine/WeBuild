<?php 

include '../controller/roleC.php';
include '../controller/utilisateurC.php';
include '../model/utilisateur.php';
include '../model/role.php';

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

 md5($_POST['password']),

);
 $cpassword = md5($_POST['cpassword']);


 
 $s=1;
}

$roleC=new roleC();
$r=0;
if(
	isset($_POST['libelle'])&&
	isset($_POST['gsm'])


)

{
    $role=new role(
		$_POST['libelle'],
		$_POST['gsm'],

);


 $r=1;
}

?>

<!DOCTYPE html>
<html>
<head>
<button><a href="../dashmin-1.0.0/index.php">Return to dashboard</a></button>
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
	

	<link rel="stylesheet" type="text/css" href="">
	
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




<div class="img">
     <img src="" alt="">
   </div>
  
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
			   <input type="number" placeholder="Age" name="age" min="16" max="99">Years old
		   
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
		   <div class="input-group">
			   <input type="password" placeholder="Confirm Password" name="cpassword"id="cpassword" required>
			   
		   </div>
				   </table>
				
<div>		
<select name="libelle" id="libelle">
<option value="" selected disabled >Choose your role</option >
	<option value="admin">Admin</option>
	
</select></div>
<br>
<br>

<div class="btn-box">
                <pre> <input type="submit" value="Envoyer">   </pre>
				
            </div>
	</div>
	<?php if($s==1 && $r==1 )
{
	
$usersC->addUser($users);
$roleC ->addrole($role);

}
?>  
<!--  Including app.js jQuery Script -->
<script language="javascript" type="text/javascript" src="../main.js"></script>
</body>
</html>

<style>
*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

.container{
    width: 360px;
    height: 500px;
    margin: 8% auto ;
    background: #fff;
    border-radius: 5px;
    position: relative;
}

.container form{
    width: 280px;
    position: absolute;
    top: 0px;
    left: 40px;
}
form input{
    width: 100%;
    padding: 10px 5px;
    margin: 5px 0;
    border: 0;
    border-bottom: 1px solid #999;
    outline : none ; 
    background: transparent;

}
form select{
	width: 100%;
    padding: 10px 5px;
    margin: 5px 0;
    border: 0;
    border-bottom: 1px solid #999;
    outline : none ; 
    background: transparent;

}
::placeholder{
    color :#777;
}
.btn-box{
    width: 110px;
    height: 35px;
    margin: 0 10px;
    background: linear-gradient(right,#1a73e8,#18abf4ad);
    border-radius: 30px;
    border :0; 
    outline : none ; 
    color :#fff ; 
    cursor: pointer;
}
input[type="submit"] {
    width: 110px;
    height: 30px auto;
    text-align: center;
	margin-top:auto;
	margin-left:70px;
	
}

input[type="submit"]:hover {
    width: 110px;
    height: 35px;
    margin: 0 10px;
    background: linear-gradient(to right, #1a73e8, #18abf4ad);
    border-radius: 30px;
    border: 0;
    outline: none;
    color: #fff;
    cursor: pointer;
	margin-top:auto;
	margin-left:70px;
}

input[type="reset"] {
    width: 110px;
    height: 30px auto;
    text-align: center;
}

input[type="reset"]:hover {
    width: 110px;
    height: 35px;
    margin: 0 10px;
    background: linear-gradient(to right, #1a73e8, #18abf4ad);
    border-radius: 30px;
    border: 0;
    outline: none;
    color: #fff;
    cursor: pointer;
}
button{
	width: 110px;
    height: 30px auto;
    text-align: center;
	background: linear-gradient(to right, #1a73e8, #18abf4ad);
	border-color:#1a73e8;
}
button:hover{
width: 110px;
    height: 35px;
    margin: 0 10px;
    background: linear-gradient(to right, #1a73e8, #18abf4ad);
    border-radius: 30px;
    border: 0;
    outline: none;
    color: #fff;
    cursor: pointer;
}
</style>