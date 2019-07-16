<?php

class ConnectModel extends MotherModel {

    public function __construct(){
        parent:: __construct();
    }


    public function addClient($lastName, $firstName, $society, $email, $password){}
    $requete = $this->connexion->prepare("INSERT INTO epicerie
        VALUES (NULL, :nom, :type)");

        $requete->bindParam(':nom',$nom);
        $requete->bindParam(':type',$type);

        $requete->execute();
}

