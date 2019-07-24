<?php


abstract class MotherModel{

    // declaration database
    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "epicerie";
    // const SERVER="sqlprive-pc2372-001.privatesql.ha.ovh.net";
    // const USER="cefiidev870";
    // const PASSWORD="r9MHb58e";
    // const BASE="cefiidev870";
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