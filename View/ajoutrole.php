
<?php
include 'navbar1.php';
include '../controller/roleC.php';
include '../model/role.php';
//role
$roleC=new roleC();
$r=0;  
if(
	isset($_POST['libelle'])&&
isset($_POST['descriptif'])
)
{
    $role=new role(
		$_POST['libelle'],
$_POST['descriptif']);
$r=1;
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
<script src="../main.js"></script>
<div class="img">
     <img src="" alt="">
   </div>
   
	<div class="container">
	
		<form action="" method="POST" class="login-email">

		<table>
		
        <div class="input-group">
                <textarea name="descriptif" placeholder="Describe your profile" id="descriptif" ></textarea>
            </div>



 
<div class="input-group">
			<select name="libelle" id="libelle" class="input-group">
              <option selected disabled>Your role</option>
              <option value="admin" name="libelle" >Admin</option>
              <option value="compagnie"name="libelle">Responsible Company</option>
              <option value="client"name="libelle">Customer</option>
			</div>


            
				
</table>

			<div class="input-group" action="">	
		<button name="submit" class="btn"  >Confirm</button>
		<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
			</div>
        
			
			
		</form>
        </div>
	<?php
	if($r==1)
	{
	$roleC->addrole($role);
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
	select{
		
		width: 100%;
		border-radius:30px;
		font-family: 'Poppins', sans-serif;
		background: #F1F3F4;
	}
</style>