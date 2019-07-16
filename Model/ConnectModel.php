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
        $requete->bindParam(':mdp', $mdp);
        
        $requete->execute();
    }

    public function testLogin($email){
        $requete = $this->connexion->prepare('SELECT * FROM client WHERE email= :email');
        $requete->bindParam(':email', $email);
        $requete->execute();
        $liste = $requete->fetch(PDO::FETCH_ASSOC);
        if(isset($liste)) {
            return $liste[0]; // On retourne la liste au point 0 car la liste est sous forme de tableau double -> $liste[0]['nom'];
        }
    }

}