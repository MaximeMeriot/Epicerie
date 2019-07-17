<?php

class ConnectModel extends MotherModel {


    public function addClient($nom, $prenom, $societe, $mdp, $email){

    $requete = $this->connexion->prepare('INSERT INTO client
        VALUES (NULL, :nom_client, :prenom_client, :societe, :mdp, :email, "0")');

        $requete->bindParam(':nom_client',$nom);
        $requete->bindParam(':prenom_client',$prenom);
        $requete->bindParam(':societe',$societe);
        $requete->bindParam(':mdp', $mdp);
        $requete->bindParam(':email',$email);
        $resultat = $requete->execute();
        
        var_dump($nom);
        var_dump($prenom);
        var_dump($societe);
        var_dump($mdp);
        var_dump($email);

        var_dump($resultat);
        var_dump($this->connexion->errorInfo());
        var_dump($_POST);
    }

    public function testLogin($email){
        $requete = $this->connexion->prepare('SELECT * FROM client WHERE email= :email');
        $requete->bindParam(':email', $email);
        $requete->execute();
        $liste = $requete->fetch(PDO::FETCH_ASSOC);
        var_dump($liste);
        if(isset($liste)) {
            return $liste; // On retourne la liste au point 0 car la liste est sous forme de tableau double -> $liste[0]['nom'];
        }
    }

}