<?php
//require '../config.php';
include 'ReponseC.php';

class usersC{

    public function addUser ($users){

        $pdo =config::getConnexion();
    
    try{


        $query =$pdo->prepare(
    
            "INSERT INTO users (image,nom,prenom,age,username,adresse,gsm,email,password,role)
            VALUES ( :image,:nom, :prenom, :age, :username,:adresse,:gsm,:email, :password,:role)"
    
        );    //query = requette
    
        $query ->execute([
    
            //on a enlevé 'id' car il est généré automatiquement 
            'image'=>$users->getimage(),
            'nom'=>$users->getnom(),
            'prenom'=>$users->getprenom(),
            'age'=>$users->getage(),
            'username'=>$users->getusername(),
            'adresse'=>$users->getadresse(),
            'gsm'=>$users->getgsm(),
            'email'=>$users->getemail(),
            'password'=>$users->getpassword(),
            'role'=>$users->getrole()
        ]);
    
    } catch (PDOException $e)
    {
     $e ->getMessage();
    }
    }

    
    public function afficher() {
        $db=config::getConnexion();
        try {
            $query=$db->prepare("SELECT * FROM users");
            $query->execute();
            $result=$query->fetchAll();
            //$result=$db->query("SELECT * FROM users");hédhy résumé l 3 lignes li kbal
            return $result;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


 public function supprimer($id){
            $sql="DELETE FROM users WHERE id=:id";
            $db=config::getConnexion();
            $query=$db->prepare($sql);
            $query->bindValue(':id',$id);
            try{
                $query->execute();//Pour remplacer ligne bindValue w ligne hédhy execute(['num'=>$num]);
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function recupererusers($id){
            $sql="SELECT * from users where id=$id";
            $db = config::getConnexion();
            try{
				$query=$db->prepare($sql);
				$query->execute();

				$users=$query->fetch();
				return $users;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
        public function recupererusername($username){
            $sql="select * from users where username like '".$username."'  ";

			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Categorie=$query->fetch();
				return $Categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        function modifierusers($users, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE users SET
                        image=:image, 
						nom = :nom, 
						prenom = :prenom,
                        age=:age,
                        username=:username,
                        adresse=:adresse,
                        gsm=:gsm,
						email = :email,
						password = :password,
                        role=:role
					WHERE id = :id'
				);
				$query->execute([
                    'image' => $users->getimage(),
					'nom' => $users->getnom(),
					'prenom' => $users->getPrenom(),
                    'age' => $users->getage(),
                    'username' => $users->getusername(),
                    'adresse' => $users->getadresse(),
                    'gsm' => $users->getgsm(),
					'email' => $users->getEmail(),
					'password' => $users->getPassword(),
                    'role'=>$users->getrole(),
					'id' => $id
				]);
			
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

      public  function connexionUser($username,$password)
        {
            $sql="SELECT * FROM users WHERE username='" .$username. "' and password='".$password."'";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0)
                {
                    $message ="incorrect";
                }else{
                    $x=$query->fetch();
                    $message=$x['username'];
                }
            }
            catch(Exception $e){
                $message="".$e->getMessage();
            }
            return $message;
        
        }


        public function recherche($key)
        {
            $sql = "SELECT * FROM users WHERE gsm LIKE '%$key%' OR prenom LIKE '%$key%' OR nom LIKE '%$key%' ";
            $db = config::getConnexion() ;
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    }
?>