<?php
class CartModel extends MotherModel 
{
    public function panier()
    {
        //    
        if (isset($_SESSION["cart"])) {
            if (isset($_GET["mode"]) && $_GET["mode"] == "remove") {
                foreach ($_SESSION["cart"] as $id) {
            //
                    if ($id == $_GET["id"]) {
                        $undo = array_search($_GET["id"],$_SESSION["cart"]);
                        unset($_SESSION["cart"][$undo]);
                    }
            
               } 
            }
        
            foreach ($_SESSION["cart"] as $id) {
                //
                $mycart[] = $this->getCart($id);
            }              
        
        }
        return $mycart;
            
    }
    public function getCart($id)
    {
        
        $sql = "SELECT * FROM `produit` WHERE id_produit = :id";
        $pre = $this->connexion->prepare($sql);
        $pre->bindParam(":id",$id);
        $pre->execute();
        $list = $pre-> fetch(PDO::FETCH_ASSOC);
        
        return $list;
        
    }
}

