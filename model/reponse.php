<?php
class reponses{
private int $num_reponses;   
private string $sujet;
private string $description;
private DateTime $date_reponse;
private int $etat;
private int $num_question;
public function  __construct($description, $date_reponse, $etat, $num_question){
    $this->description=$description;;
    $this->date_reponse=$date_reponse;
    $this->etat=$etat;
    $this->num_question=$num_question;
}
public function get_num_reponse()
{
    return $this->num_reponse;
}
public function get_description()
{
    return $this->description;
}
public function get_date_reponse() 
{
    return $this->date_reponse;
}
public function get_etat()
{
    return $this->etat;
}
public function get_num_question()
{
    return $this->num_question;
}



/*
public function set_num(int $num_reclamation){
    $this->num_reclamation=$num_reclamation;
}
public function set_sujet(string $sujet){
    $this->sujet=$sujet;
}
public function set_description(string $description){
    $this->description=$description;
}
public function set_date_reclamtion(DateTime $date_reclamtion){
    $this->date_reclamtion=$date_reclamtion;
}
public function set_date_reclamation(int $etat){
    $this->etat=$etat;
}
public function set_id_client(int $id_client){
    $this->id_client=$id_client;
}*/
}


?>








