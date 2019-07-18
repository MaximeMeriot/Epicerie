<?php
class CartModel extends MotherModel 
{
    public function panier()
    {
        if (isset($_GET["id"])) {
            
             if (isset($_SESSION["cart"])) {
                if (!in_array($_GET["id"],$_SESSION["cart"])) {
                    # code...
                    array_push($_SESSION["cart"],$_GET["id"]);
                }
                // var_dump($_SESSION["cart"]);
                foreach ($_SESSION["cart"] as $id) {
                    //
                    $mycart[] = $this->getCart($id);
                    // $lists = $this->getCart($id);
                    // foreach ($lists as $list) {
                    //     $nom_produit = $list["nom_produit"];
                    //     $description = $list["description"];
                    //     $photo = $list["photo"];
                    //     $prix_unitaire = $list["prix_unitaire"];
                    //     $qte_stock = $list["qte_stock"];
                    //     $mycart = [];
                    //     array_push($mycart,$nom_produit, $description,
                    //      $photo, $prix_unitaire, $qte_stock);
                         
                    // }
                } 
             }else {
                 $_SESSION["cart"][0] = $_GET["id"];
             }
        }else {
           $this->page .= "cart empty";
        }
       
        // var_dump($mycart);
        // var_dump($_SESSION);
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

