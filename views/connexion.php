
<?php 

session_start();

include_once '../Controller/utilisateurC.php';
include_once '../Model/utilisateur.php';

$message="";
$usersC=new usersC();
if (isset($_POST["username"])&&
isset($_POST["password"]))
{
	if(!empty($_POST["username"])&&
	!empty($_POST["password"]))
{
	$user=$usersC->recupererusername($_POST["username"]);
	$role=$user['role'];
	$message=$usersC->connexionUser($_POST["username"],$_POST["password"]);
	$username=$_POST["username"];
	$password=sha1($_POST["password"]);


	if($message!='incorrect')
	{
	if($role=="client")
	{	$_SESSION['username']=$_POST["username"];
	
		header('location:afficherMesQuestion.php');}
		else {$_SESSION['username']=$_POST["username"];
			header('location:../Tripee/admin/index.php?page=home');}
		}
	}
	else{
		$message='incorrect';
	}
}else
{
$message="Missing information";

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script language="javascript" type="text/javascript" src="../main.js"></script>

	<link rel="stylesheet" type="text/css" href="stylezaw.css">

	<title>Login Form - Pure Coding</title>
</head>
<body>
<div class="img">
     <img src="" alt="">
   </div>
   
	<div class="container">
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username"id="username"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"id="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
<?php





?>



</html>
