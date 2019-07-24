<?php
class CartView extends MotherView
{

    public function displayPanier($list)
    {
       

        $table = '
    <div class="row col-12 justify-content-center">
    <a class="btn btn-info my-5 mx-2 btn-block btn-lg"><h2><i class="fas fa-shopping-cart"></i> Panier</h2></a>
    </div>';

        $table .= '
    <div class="row col-12 table-responsive">
    <table class="table  text-center">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix unitaire</th> 
            <th scope="col">Quantité en stock</th> 
            <th scope="col">Quantité choisie</th> 
            <th scope="col">Total</th>     
            <th scope="col"></th>     
          </tr>
        </thead>
        <tbody>                        
    ';

        foreach ($list as $value) {
            // var_dump(strpos($key, 'produit'));

            // if (strpos($key, 'produit') !== false) {
                // var_dump($value);

                // $id = substr($key, 7);
                // var_dump($key);
                // echo ' ';

                // if (isset($_SESSION["id_produit"])){
                //     $id = $_SESSION["id_produit"];
                // }
                $quantite = $_SESSION['produit'.$value['id_produit']];
                $total = $value['prix_unitaire'] * $quantite;
                $totalCommande = $total + $totalCommande;

                $table .= '
        <tr>        
            <td>' . $value['id_produit'] . '</td>
            <td>' . $value['nom_produit'] . '</td>
            <td>' . $value['prix_unitaire'] . ' €/kg</td>
            <td>' . $value['qte_stock'] . '</td>
            <td>'. $quantite . ' kg</td>
            <td>'. $total . ' €</td>
        </tr>';
            
        }

        $table .= '                       
        </tbody>
        </table>
      
        <div class= "container text-center my-4"><p><b>Total commande:</b> '. $totalCommande . '€ </p></div>
        <div class= "container text-center my-4"><a class="btn btn-success text-center" href="index.php?controller=ValidPanier&action=ValidPanier" role="button">Valider le panier</a>
        </div>';

        $this->page .= $table;
        $this->display();
    }
}

