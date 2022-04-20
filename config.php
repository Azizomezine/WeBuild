<?php

    class config {
        private static $pdo = NULL;  //pdo PHP DATA OBJECT

        public static function getConnexion() {
        if (!isset(self::$pdo)) {
            try{
            self::$pdo = new PDO('mysql:host=localhost;dbname=mybd', 'root', '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
           
            }catch(Exception $e){
            die('Erreur: '.$e->getMessage());
            }
        }
        return self::$pdo;
        }
    }
?>