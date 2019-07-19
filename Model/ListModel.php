<?php

class ListModel extends MotherModel
{

    public function getList()
    {
        $requete = "SELECT * FROM Produit";
        $result = $this -> connexion -> query($requete);
        $list = array();

        if ($result){
            $list = $result -> fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    }

    public function addCompteur($idProduit)
    {
        // echo '<pre>Vous etes ici';
        // var_dump($_SESSION);
        // var_dump($idProduit);

        $compteur = 'produit' . $idProduit;
    
        if (isset($_SESSION["$compteur"])){
            $_SESSION["$compteur"] ++;
        
        } else {
            $_SESSION["$compteur"] = 1;

        }
        // echo 'je suis la';
        // var_dump($_SESSION);
    }
   

}
