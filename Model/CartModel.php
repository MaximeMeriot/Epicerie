<?php
class CartModel extends MotherModel
{
    function getProduit($id_produit)
    {
        $requete = $this->connexion->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
        $requete->bindParam(':id_produit', $id_produit);

        $result = $requete->execute();

        if ($result) {
            $produit = $requete->fetch(PDO::FETCH_ASSOC);
        }
        // echo'<pre>';
        // var_dump($produit);
        return $produit;
    }

    function addPanier($idProduit)
    {
        $compteur = 'produit' . $idProduit;

        if (isset($_SESSION["$compteur"])) {
            $_SESSION["$compteur"]++;
        } else {
            $_SESSION["$compteur"] = 1;
        }
    }

    /**
     * recuperation infos correspondant au produit du panier
     * @return array les produits du panier
     */
    public function getPanier()
    {
        $panier = array();

        foreach ($_SESSION as $key => $value) {
            // var_dump(strpos($key, 'produit'));

            if (strpos($key, 'produit') !== false) {

                $id = substr($key, 7);
                $panier[] = $this->getProduit($id);
            }
        }
        // var_dump($panier);
        return $panier;
    }
}
