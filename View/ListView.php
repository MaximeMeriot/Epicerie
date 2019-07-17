<?php

class ListView extends MotherView
{

    public function displayHomeList()
    {
        $this->page .= "<h1 class='text-center'>Accueil</h1>";
        $this->displayPage();
    }

    public function displayList($list)
    {
        $i = 0;
        $this->page .= '<h2 class = "text-center">Liste des produits disponibles</h2>';

        $this->page .= '<div class="row container mx-auto text-center col-12" id="liste">';


        foreach ($list as $element) {
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
                        <a href="modifPanier.php?'. $element['nom_produit'] . '=1" class="btn btn-secondary">Ajouter au panier</a>
                        <p class="card-text text-center">Nombre produit ajouté : </p>
                        <img class="card-img-top img-fluid py-3" src=" '
                        . $element['photo'] 
                        . '" alt="'. $element['nom_produit'] . '">
                    </div>
                </div><br />';
        }

        $this->page .= ' </div>';

        $this->displayPage();
    }

    protected function displayPage()
    {
        $this->page .= "</div>";
        $this->page .= file_get_contents("html/footer.html");
        echo $this->page;
    }
}
