<?php 
include 'navbar1.php';
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

 
 md5($_POST['password']));
 $cpassword = md5($_POST['cpassword']);

 
 $s=1;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
<script language="javascript" type="text/javascript" src="../main.js"></script>
<div class="img">
     <img src="" alt="">
   </div>
   
	<div class="container">
		<form name ="f"action="" method="POST" class="login-email">
           
			<div class="input-group">
			<input type="text" placeholder="image" name="image" id="image"  required>
			</div>
			<table>
				<tr>
					<td>
			<div class="input-group">
				<input type="text" placeholder="Name" name="nom" id="nom" required>
			</div>
		</td>
			<td>
			<div class="input-group">
				<input type="text" placeholder="Lastname" name="prenom" id="prenom" required>
			</div></td>
			</tr>
			<tr>
            <td>
              <div class="input-group">
                <input type="text" placeholder="Age" name="age" id="age">
			
                </div>
          </td>
          
          <td>
            <div class="input-group">
              <input type="text" placeholder="GSM"name="gsm"  id="gsm"required>
            </div></td>
          </tr>
			
				
			<div class="input-group">
				<input type="text" placeholder="Adresse" name="adresse" id="adresse" required>
			</div>
			
			
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" id="username"  required>
			</div>
			
			
		

			<div class="input-group">
				<input type="email" placeholder="Email" name="email" id="email" required>
			</div>
			</tr>
			<tr>
				<td>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  id="password"required>
            </div></td>
			<td>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword"id="cpassword"  required>
				
			</div></td>
			</tr>
		
			</table>
			<div class="input-group">
				
				<button name="submit"  onclick="return verif()" class="btn" >Register</button>
				
			</div>
			<a href="ajoutrole.php">Choose your role in our website</a>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
			
		</form>

	</div>
	<?php if($s==1)
{
$usersC->addUser($users);

}
?>  
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
	  margin-top: 10%;
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
</style>