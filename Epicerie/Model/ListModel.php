<?php

class ListModel extends MotherModel
{

    function getList()
    {

        $requete = "SELECT * FROM Produit";
        $result = $this -> connexion -> query($requete);
        $list = array();
        if ($result){
            $list = $result -> fetchAll(PDO::FETCH_ASSOC);
        }
        return $list;
    
    }

    function addCompteur($idProduit)
    {  
        $compteur = 'produit' . $idProduit;
    
        if (isset($_SESSION["$compteur"])){
            $_SESSION["$compteur"] ++;
        
        } else {
            $_SESSION["$compteur"] = 1;

        }
    }

}