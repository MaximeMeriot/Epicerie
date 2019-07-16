<?php


class AdminClientsModel extends MotherModel{


//-----------------------------------------------------------------------------------------------------------------------------------   
  public function getList(){

    // sélection des lignes
    $requete = "SELECT * FROM produit";
    $resultat = $this->connexion->query($requete);
    $list = $resultat->fetchAll(PDO::FETCH_ASSOC);

    return $list;
}
//-----------------------------------------------------------------------------------------------------------------------------------   

}