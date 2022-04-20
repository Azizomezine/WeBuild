<?php

 class users{

    // private int $NumAbon;
     private  $id = null;
     private  $image=null;
     private $nom=null;
     private  $prenom=null;
     private  $age=null;
     private $username=null;
     private $adresse=null;
     private  $gsm=null;
     private  $email=null;
     private $password=null;
     
     
 public function  __construct ($im,$n,$p,$dn,$us,$ad,$g,$e,$ps) //$a,
    {
    //$this->NumAbon=$a;
    
    $this->image=$im;
    $this->nom=$n;
    $this->prenom=$p;
    $this->age=$dn;
    $this->username=$us;
    $this->adresse=$ad;
    $this->gsm=$g;
    $this->email=$e;
    $this->password=$ps;
    
    }

   /* public function getNumAbonnement()
    {
        return $this->NumAbon;
    }*/
    public function getid():int
    {
        return $this->id;
    }  
    public function getimage():string
    {
        return $this->image;
    }  
    public function getnom():string
    {
        return $this->nom;
    }  
    public function getprenom():string
    {
        return $this->prenom;
    }   
    public function getage():string
    {
        return $this->age;
    }
    public function getusername():string
    {
        return $this->username;
    }
    public function getadresse():string
    {
        return $this->adresse;
    }
    public function getgsm():int
    {
        return $this->gsm;
    }
    public function getemail():string
    {
        return $this->email;
    }
    public function getpassword():string
    {
        return $this->password;
    }



    function setimage(string $image){
        $this->image=$image;
    }
    function setnom(string $nom){
        $this->nom=$nom;
    }
    function setprenom(string $prenom){
        $this->prenom=$prenom;
    }
    function setage(string $age){
        $this->age=$age;
    }
    function setusername(string $username){
        $this->username=$username;
    }
    function setadresse(string $adresse){
        $this->adresse=$adresse;
    }
    function setgsm(int $gsm){
        $this->gsm=$gsm;
    }
    function setemail(string $email){
        $this->email=$email;
    }
    function setpassword(string $password){
        $this->password=$password;
    }
 
    }
 





?>