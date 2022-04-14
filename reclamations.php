<?php
class reclamations{
private int $num_reclamation;   
private string $sujet;
private string $description;
private DateTime $date_reclamtion;
private int $etat;
private int $id_client;
public function  __construct($sujet, $description, $date_reclamtion, $etat, $id_client){
    $this->sujet=$sujet;
    $this->description=$description;;
    $this->date_reclamtion=$date_reclamtion;
    $this->etat=$etat;
    $this->id_client=$id_client;
}
public function get_num_reclamation()
{
    return $this->num_reclamation;
}
public function get_sujet()
{
    return $this->sujet;
}
public function get_description()
{
    return $this->description;
}
public function get_date_reclamation() 
{
    return $this->date_reclamtion;
}
public function get_etat()
{
    return $this->etat;
}
public function get_id_client()
{
    return $this->id_client;
}




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
}
}











