<?php
require_once '../config.php';

class roleC{

    public function addrole ($role){

        $pdo =config::getConnexion();
    
    try{


        $query =$pdo->prepare(
    
            "INSERT INTO roles (libelle,descriptif)
            VALUES (:libelle,:descriptif)"
    
        );    //query = requette
    
        $query ->execute([
    
            //on a enlevé 'id' car il est généré automatiquement 
            'libelle'=>$role->getlibelle(),
            'descriptif'=>$role->getdescriptif()
            
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

    public function afficherUser($idRole)
    {
        try {
        $pdo =getConnexion();
        $query = $pdo->prepare(
            'SELECT * FROM users WHERE roles =:id'
        );
        $query->execute([
            'id'=>$idRole
        ]);
        return $query->fetchall();
    }catch(PDOException $e)
    {
        $e->getMessage();
    }
} 


public function supprimer($idRole){
    $sql="DELETE FROM roles WHERE idRole=:idRole";
    $db=config::getConnexion();
    $query=$db->prepare($sql);
    $query->bindValue(':idRole',$idRole);
    try{
        $query->execute();//Pour remplacer ligne bindValue w ligne hédhy execute(['num'=>$num]);
    }catch(PDOException $e){
        $e->getMessage();
    }
}

public function recupererrole($idRole){
    $sql="SELECT * from roles where idRole=$idRole";
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


function modifierrole($role, $idRole){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE roles SET
                libelle=:libelle, 
                descriptif = :descriptif
                
            WHERE idRole = :idRole'
        );
        $query->execute([
            'libelle' => $role->getlibelle(),
            'descriptif' => $role->getdescriptif(),
            'idRole' => $idRole
        ]);
    
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

}