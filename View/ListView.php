<?php
class ListView extends MotherView
{
    public function displayHomeList()
    {
        $this->page .= "<h1 class='text-center'>Accueil</h1>";
        $this->display();
    }
   
        // foreach ($list as $element) {
            // echo '<pre>';
            // var_dump($element);
            // $compteur = 'produit' . $element['id_produit'];
            // $quantite = 0;
            // if (isset($_SESSION["$compteur"])){
            //     $quantite = $_SESSION["$compteur"];
            // }           
            // var_dump($_SESSION['$compteur']);
            // var_dump($_SESSION["$compteur"]);
            
        public function displayList($list)
    {

        $this->page .= '<h2 class = "text-center">Liste des produits disponibles </h2> ';

        $this->page .= '<div class="row container mx-auto text-center col-12" id="liste">';


        foreach ($list as $element) {
            
            $compteur = 'produit' . $element['id_produit'];
            $quantite = 0;
            if (isset($_SESSION["$compteur"])){
                $quantite = $_SESSION["$compteur"];
            }           
        
            
            $this->page .= '
                <div class="card col-md-4 col-sm-6 text-center mx-auto bg-light">
                    <div class="card-body">
                    <h3 class="card-title text-center">'
                . $element['nom_produit']
                . '</h3><h6>'
                . $element['description']
                . '</h6>
                        <p class=" text-center text-dark">'
                . $element['prix_unitaire'] . '€/kg'
                . '</p> 
                        <a href="index.php?controller=List&action=addCompteur&idProduit=' . $element['id_produit'] . '" class="btn btn-secondary id="idProduit">Ajouter au panier</a>
                        <p class="card-text text-center">Quantité produit ajouté :'. $quantite . '  kg</p>
                        <img class="card-img-top img-fluid py-3" src=" '
                . $element['photo']
                . '" alt="' . $element['nom_produit'] . '">
                    </div>
                </div><br />';
                
               
        }

    
        $this->display();
    }
    
}



 // echo '<pre>';
            // var_dump($element);
            // $compteur = 'produit' . $element['id_produit'];
            // $quantite = 0;
            // if (isset($_SESSION["$compteur"])){
            //     $quantite = $_SESSION["$compteur"];
            // }           
            // var_dump($_SESSION['$compteur']);
            // var_dump($_SESSION["$compteur"]);