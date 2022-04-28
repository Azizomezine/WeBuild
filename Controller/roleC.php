<?php


class roleC{

    public function addrole ($role){

        $pdo =config::getConnexion();
    
    try{


        $query =$pdo->prepare(
    
            "INSERT INTO roles (libelle,gsm)
            VALUES (:libelle,:gsm)"
    
        );    //query = requette
    
        $query ->execute([
    
            //on a enlevé 'id' car il est généré automatiquement 
            'libelle'=>$role->getlibelle(),
            'gsm'=>$role->getgsm(),
            
        ]);
        
    } catch (PDOException $e)
    {
     $e ->getMessage();
    }
    }




    public function afficher() {
        $db=config::getConnexion();
        try {
            $query=$db->prepare("SELECT * FROM roles");
            $query->execute();
            $result=$query->fetchAll();
            //$result=$db->query("SELECT * FROM users");hédhy résumé l 3 lignes li kbal
            return $result;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

 







}