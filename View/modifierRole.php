<?php
   ob_start();
    include_once '../Model/role.php';
    include_once '../Controller/roleC.php';




    session_start();
	$roleC = new roleC();
	$error = "";
	
	if (isset($_POST["libelle"]) &&
		isset($_POST["descriptif"]) 
      
       
	){
		if ( !empty($_POST["libelle"]) &&
            !empty($_POST["descriptif"]) 
           
        ) {
                $role=new role(
                    $_POST['libelle'],
                    $_POST['descriptif']
                   )
			;
			
            $roleC->modifierrole($role, $_GET['idRole']);
            header('refresh:2;url=../dashmin-1.0.0/index.php');
        }
        else
            $error = "Missing information";
	}

       
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
       
        
        <form value="modifier" name="modifier" action="" method="POST">
            <table  align="center">
            <?php
            if (isset($_GET['idRole'])){
				$role = $roleC->recupererrole($_GET['idRole']);}
            ?>
            <td><input type="hidden" name="idRole" value="<?php echo $role['idRole'];?>"></td>
           
            <tr>

                    <td>
                        <label for="descriptif">Role:
                        </label>
                    </td>
                    <td> <div class="input-group">
                <textarea name="descriptif" placeholder="Describe your profile" id="descriptif" value="<?php echo $role['descriptif']?>" ></textarea>
            </div>
        </td>
                </tr>
				<tr>
                    <td>
                        <label for="libelle">Role:
                        </label>
                    </td>
                    <td><div class="input-group">
			<select name="libelle" id="libelle" value="<?php echo $role['libelle']?>"class="input-group">
              <option selected disabled>Your role</option>
              <option value="admin" name="libelle" >Admin</option>
              <option value="compagnie"name="libelle">Responsible Company</option>
              <option value="client"name="libelle">Customer</option>
			</div>
</td>
                </tr>
               
                    <td>
                        <input type="submit" onclick="return verif()" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                    <button> <a href="../dashmin-1.0.0/index.php">Annuler</a> </button>
                    </td>
                </tr>
              
            </table>
           
        </form>
       <?php
           
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
   table{
    box-sizing: border-box;
    
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    height: 30px;
    overflow: hidden;
    max-width: 390px;
    background: #fff;
    padding: 30px;
    border-radius: 30px;
    margin-bottom: 5%;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    font-size: 1rem;
    border-radius: 15px;
    background: transparent;
    outline: none;
    transition: .3s;
    padding-left: 15px;
    font-size: 17px;
    
   }

   input[type=submit]{
    border-color: #1A73E8;
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #1A73E8;
    outline: none;
    border-radius: 6px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
    
   }
   button{
    border-color: #1A73E8;
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #1A73E8;
    outline: none;
    border-radius: 6px;
    font-size: 1.2rem;
    color: #FFFF;
    cursor: pointer;
    transition: .3s;
   }
   input[type=reset]{
    border-color: #1A73E8;
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #1A73E8;
    outline: none;
    border-radius: 6px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
   }
</style>