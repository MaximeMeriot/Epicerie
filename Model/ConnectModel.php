<?php

class ConnectModel extends MotherModel {

    public function __construct(){
        parent:: __construct();
    }


    public function addClient($nom, $prenom, $societe, $email, $mdp){
    $requete = $this->connexion->prepare("INSERT INTO client
        VALUES (NULL, :nom, :prenom, :societe, :email, :mdp)");

        $requete->bindParam(':nom',$nom);
        $requete->bindParam(':prenom',$prenom);
        $requete->bindParam(':societe',$societe);
        $requete->bindParam(':email',$email);
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $requete->bindParam(':mdp', $hash);
        
        $requete->execute();
    }

}