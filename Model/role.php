<?php

 class role{

    // private int $NumAbon;
    private $idRole=null;
     private string  $libelle;
     private string $descriptif;
    
     
     
 public function  __construct ($l,$d) //$a,
    {
    //$this->NumAbon=$a;
    
    $this->libelle=$l;
    $this->descriptif=$d;
    
    
    }

   /* public function getNumAbonnement()
    {
        return $this->NumAbon;
    }*/
    public function getidRole():int
    {
        return $this->idRole;
    }  
    public function getlibelle()
    {
        return $this->libelle;
    }  
    public function getdescriptif()
    {
        return $this->descriptif;
    }  
   
    }
 





?>