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
        $this->page .= '<div class="row col-12 mx-auto justify-content-center">
        <a class="btn btn-info my-3 btn-block btn-lg"><h2><i class="fas fa-clipboard-list"></i> Liste des produits</h2></a>
        </div>';

        $this->page .= '<div class="row container mx-auto mb-4 text-center col-12" id="liste">';


        foreach ($list as $element) {
            
            $compteur = 'produit' . $element['id_produit'];
            $quantite = 0;
            if (isset($_SESSION["$compteur"])){
                $quantite = $_SESSION["$compteur"];

                if ($quantite <0){
                    $quantite =0;
                }
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
                . '</p> <br />
                        <a href="index.php?controller=List&action=addCompteur&idProduit=' . $element['id_produit'] . '" type = "button" class="btn btn-success text-success" id="idProduit">+</a>
                        <div><form><input  class = "text-center" value = '. $quantite . '> </input><form></div>
                        <a href="index.php?controller=List&action=removeCompteur&idProduit=' . $element['id_produit'] . '" type = "button"  class="btn btn-danger text-danger" id="idProduit">-</a>
                        <br /><br />
                        <p class="card-text text-center">Quantité produit ajouté : '. $quantite . '  kg</p>
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