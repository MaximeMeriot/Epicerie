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
   

}