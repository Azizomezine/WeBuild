<?php
  
    include_once '../Model/utilisateur.php';
    include_once '../Controller/utilisateurC.php';




    session_start();
	$usersC = new usersC();
	$error = "";
	
	if (isset($_POST["image"]) &&
		isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["age"]) &&
        isset($_POST["username"]) &&
        isset($_POST["adresse"]) &&
        isset($_POST["gsm"]) &&
        isset($_POST["email"]) && 
        isset($_POST["password"])
        && 
        isset($_POST["role"])
	){
		if ( !empty($_POST["image"]) &&
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) &&
            !empty($_POST["age"]) && 
            !empty($_POST["username"]) &&
            !empty($_POST["adresse"]) &&
            !empty($_POST["gsm"]) &&
            !empty($_POST["email"]) && 
            isset($_POST["password"])&& 
            !empty($_POST["role"])
        ) {
                $users=new users(
                    $_POST['image'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['age'],
                    $_POST['username'],
                    $_POST['adresse'],
                    $_POST['gsm'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['role'])
			;
			
            $usersC->modifierusers($users, $_GET['id']);
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
            if (isset($_GET['id'])){
				$users = $usersC->recupererusers($_GET['id']);}
            ?>
            
           
            <tr>

                    <td>
                        <label for="image">Picture:
                        </label>
                    </td>
                    <td><input type="text" name="image" id="image" value="<?php echo $users['image'];?>"></textarea></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Name:
                        </label>
                    </td>
                    <td><input  type="text" name="nom" id="nom" maxlength="20"value="<?php echo $users['nom'];?>"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Lastname:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom"maxlength="20"value="<?PHP echo $users['prenom']?>"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <label for="age">Age:
                        </label>
                    </td>
                    <td><input type="text" name="age" id="age" value="<?PHP echo $users['age'];?>"></textarea></td>
                </tr>
                <td>
                        <label for="age">Username:
                        </label>
                    </td>
                    <td><input type="text" name="username" id="username" value="<?PHP echo $users['username'];?>"> </textarea></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adress:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse"  id="adresse"value="<?PHP echo $users['adresse'];?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="gsm">GSM:
                        </label>
                    </td>
                    <td><input type="text" name="gsm" id="gsm" value="<?PHP echo $users['gsm'];?>" ></textarea>
                </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?PHP echo $users['email'];?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password"value="<?PHP echo $users['password'];?>"></textarea>
                    </td>
                </tr>       
                       
                <tr>
               
                    <td></td>
                    <td>
                        <input type="submit" onclick="return verif()" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                    <button> <a href="../dashmin-1.0.0/index.php">Annuler</a> </button>
                    </td>
                </tr>
           <tr>     	
<select name="role" id="role">
<option value="" selected disabled >Choose your role</option >
	<option value="customer">Customer</option>
	<option value="company">Company</option>
</select>
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