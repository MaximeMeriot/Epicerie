<?php
class ListModel extends MotherModel
{
    function getList()
    {
        $requete = "SELECT * FROM Produit";
        $pre = $this ->connexion -> prepare($requete);
        $pre->execute();
        $list = array();
        $list = $pre-> fetchAll(PDO::FETCH_ASSOC);
        
        return $list;
    }
    public function panierlist()
    {
       
        // session_destroy();
        if ($_GET["id"]) {
            # code...
            if (isset($_SESSION["cart"])) {
                
                if (!in_array($_GET["id"],$_SESSION["cart"])) {
                    # code...
                    array_push($_SESSION["cart"],$_GET["id"]);
                }
                
                
            }else {
                $_SESSION["cart"][0] = $_GET["id"];
            }
        }  
            
    }
   


    // public function addCompteur($idProduit)

        // $compteur = 'produit' . $idProduit;
    
        // if (isset($_SESSION["$compteur"])){
        //     $_SESSION["$compteur"] ++;
        
        // } else {
        //     $_SESSION["$compteur"] = 1;

        // }
      
    }
   

