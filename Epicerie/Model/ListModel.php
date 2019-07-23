<?php
class ListModel extends MotherModel
{
    function getList()
    {
        $requete = "SELECT * FROM produit";
        $pre = $this ->connexion -> prepare($requete);
        $pre->execute();
        $list = array();
        $list = $pre-> fetchAll(PDO::FETCH_ASSOC);
        
        return $list;
    }

    
    public function addCompteur($idProduit)
    {

        $compteur = 'produit' . $idProduit;
    
        if (isset($_SESSION["$compteur"])){
            $_SESSION["$compteur"] ++;
        
        } else {
            $_SESSION["$compteur"] = 1;

        }
      
    }

    public function removeCompteur($idProduit)
    {

        $compteur = 'produit' . $idProduit;
    
        if (isset($_SESSION["$compteur"])){
            $_SESSION["$compteur"] --;
        }
      
    }
   

}