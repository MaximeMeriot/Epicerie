<?php


class AdminProduitsModel extends MotherModel{


//-----------------------------------------------------------------------------------------------------------------------------------   
  public function getList(){

    // sélection des lignes
    $requete = "SELECT * FROM produit";
    $resultat = $this->connexion->query($requete);
    $list = $resultat->fetchAll(PDO::FETCH_ASSOC);

    return $list;
}
//-----------------------------------------------------------------------------------------------------------------------------------   
 public function addItem($nom,$description,$photo,$prix,$qte){

        

    $requete = $this->connexion->prepare("INSERT INTO produit
    VALUES (NULL, :nom,:description,:photo, :prix, :qte)");

    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':description',$description);
    $requete->bindParam(':photo',$photo);
    $requete->bindParam(':prix',$prix);
    $requete->bindParam(':qte',$qte);


    $requete->execute();

}
//-----------------------------------------------------------------------------------------------------------------------------------   
 public function updateItem($id_produit,$nom,$description,$photo,$prix,$qte){

    $requete = $this->connexion->prepare("UPDATE produit
    SET nom_produit = :nom,
    description = :description,
    photo = :photo,
    prix_unitaire = :prix,
    qte_stock = :qte
    WHERE id_produit= :id_produit");


    $requete->bindParam(':id_produit',$id_produit);
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':description',$description);
    $requete->bindParam(':photo',$photo);
    $requete->bindParam(':prix',$prix);
    $requete->bindParam(':qte',$qte);

    $requete->execute();

}
//-----------------------------------------------------------------------------------------------------------------------------------   
public function deleteItem($item){

      

    $requete = $this->connexion->prepare("DELETE FROM produit
    WHERE id_produit= :id_produit");
    
    $requete->bindParam(':id_produit',$item);
  
    $resultat=$requete->execute();
    
 
}
//-----------------------------------------------------------------------------------------------------------------------------------   
public function getItem($id_produit){

 // sélection ligne en fonction de l'id

$requete = $this->connexion->prepare('SELECT * FROM produit WHERE id_produit= :id_produit');
$requete->bindParam(':id_produit',$id_produit);
$requete->execute();
$liste = $requete->fetch(PDO::FETCH_ASSOC);

return $liste;
}



















}