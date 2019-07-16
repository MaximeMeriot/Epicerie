<?php

class Model extends MotherModel{

    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE ="";  // A CHANGER
    private $connexion;

    public function __construct() {
        try {
        $this->connexion = new
        PDO("mysql:host=" .
        self::SERVER . ";dbname=" .
        self::BASE, self::USER,
        self::PASSWORD);
        } 
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}