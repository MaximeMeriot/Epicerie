<?php


class AdminClientsModel extends MotherModel{


//-----------------------------------------------------------------------------------------------------------------------------------   
  public function getList(){

    // sélection des lignes
    $requete = "SELECT * FROM client";
    $resultat = $this->connexion->query($requete);
    $list = $resultat->fetchAll(PDO::FETCH_ASSOC);

    return $list;
}
//-----------------------------------------------------------------------------------------------------------------------------------   
 public function addItem($nom_client,$prenom_client,$societe,$mdp,$email,$admin){


        

    $requete = $this->connexion->prepare("INSERT INTO client
    VALUES (NULL, :nom_client,:prenom_client,:societe, :mdp, :email, :admin)");

    $requete->bindParam(':nom_client',$nom_client);
    $requete->bindParam(':prenom_client',$prenom_client);
    $requete->bindParam(':societe',$societe);
    $requete->bindParam(':mdp',$mdp);
    $requete->bindParam(':email',$email);
    $requete->bindParam(':admin',$admin);

    $requete->execute();

}
//-----------------------------------------------------------------------------------------------------------------------------------   
 public function updateItem($id_client,$nom_client,$prenom_client,$societe,$mdp,$email,$admin){

    
    $requete = $this->connexion->prepare("UPDATE client
    SET nom_client = :nom_client,
    prenom_client = :prenom_client,
    societe = :societe,
    mdp = :mdp,
    email = :email,
    admin = :admin
    WHERE id_client= :id_client");


    $requete->bindParam(':id_client',$id_client);
    $requete->bindParam(':nom_client',$nom_client);
    $requete->bindParam(':prenom_client',$prenom_client);
    $requete->bindParam(':societe',$societe);
    $requete->bindParam(':mdp',$mdp);
    $requete->bindParam(':email',$email);
    $requete->bindParam(':admin',$admin);

    $requete->execute();

}
//-----------------------------------------------------------------------------------------------------------------------------------   
public function deleteItem($item){

      

    $requete = $this->connexion->prepare("DELETE FROM client
    WHERE id_client= :id_client");
    
    $requete->bindParam(':id_client',$item);
  
    $resultat=$requete->execute();
    
 
}
//-----------------------------------------------------------------------------------------------------------------------------------   
public function getItem($id_client){

 // sélection ligne en fonction de l'id

$requete = $this->connexion->prepare('SELECT * FROM client WHERE id_client= :id_client');
$requete->bindParam(':id_client',$id_client);
$requete->execute();
$liste = $requete->fetch(PDO::FETCH_ASSOC);

return $liste;
}



















}