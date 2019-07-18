<?php


class HistoryView extends MotherView {

    protected $page;
//--------------------------------------------------------------------------------------------------------------------------------------
    public function __construct(){
        $this->page=$this->searchHtml("html/header.html");
        $this->page.=$this->searchHtml("html/nav.html");
    }
//--------------------------------------------------------------------------------------------------------------------------------------

    protected function searchHtml($page){

        return file_get_contents($page);
    }
//--------------------------------------------------------------------------------------------------------------------------------------
    protected function display(){
        $this->page.=$this->searchHTML("html/footer.html");
        echo $this->page;
  
    }
//--------------------------------------------------------------------------------------------------------------------------------------

    public function displayHome(){

    $this->page.=$this->searchHTML("html/adminAccueil.html");
    $this->display();
}

//--------------------------------------------------------------------------------------------------------------------------------------
public function displayList($list){


    $table= "<h5 class='my-5'> Base de données - Commandes -</h5>";
    
    foreach($list as $key=>$value){

        $table.='
        <div class="row my-5 table-responsive">
        <table class="table my-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Commande n°: '.$value["entete"]["num_commande"].'</th>
                <th scope="col">Client: '.$value["entete"]["nom_client"]." ".$value["entete"]["prenom_client"].'</th>
                <th scope="col">Société: '.$value["entete"]["societe"].'</th> 
                <th scope="col">'.$value["entete"]["date_commande"].'</th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>   
            <thead class="thead-light">
            <tr>
              <th scope="col"></th>
              <th scope="col">Produit</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix unitaire TTC</th> 
              <th scope="col">Total TTC</th>

            </tr>
          </thead>
                   
        ';

        
        foreach($value['items'] as $i=>$element){

            $table.='
            <tr>        
                <td>'.($i+1).'</td>
                <td>'.$element["nom_produit"].'</td>
                <td>'.$element["qte_prdt_commande"].'</td>
                <td>'.$element["prix_unitaire"].'</img></td>
                <td>'.($element["prix_unitaire"]*$element["qte_prdt_commande"]).'</td>
               
    
            <tr>';
    

        }



    }



    $table.='                       
        </tbody>
        </table>
        </div>';

    $this->page.=$table;
    $this->display();

}


}