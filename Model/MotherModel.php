<?php


abstract class MotherModel{

    // declaration database
    const SERVER="localhost";
    const USER="root";
    const PASSWORD="";
    const BASE="cefii";

    protected $connexion;
    
 //-----------------------------------------------------------------------------------------------------------------------------------   
    public function __construct(){
        // connexion database
        try {
            $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
        }
        catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        
    }
 //-----------------------------------------------------------------------------------------------------------------------------------   

}