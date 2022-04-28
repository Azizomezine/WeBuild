<?php

 class role{

    // private int $NumAbon;
   
     private string  $libelle;
     private string $gsm;
    
     
     
 public function  __construct ($l,$g) //$a,
    {
    //$this->NumAbon=$a;
    
    $this->libelle=$l;
    $this->gsm=$g;
    
    
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
    public function getgsm()
    {
        return $this->gsm;
    }  
   
    }
 





?>