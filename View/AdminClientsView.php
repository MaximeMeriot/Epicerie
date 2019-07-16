<?php


class AdminClientsView extends MotherView {

    protected $page;
//--------------------------------------------------------------------------------------------------------------------------------------
    public function __construct(){
        $this->page=$this->searchHtml("html/header.html");
        $this->page.=$this->searchHtml("html/adminNav.html");
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


//--------------------------------------------------------------------------------------------------------------------------------------
public function displayList($list){

    $table='
    <div class="row justify-content-center">
    <a class="btn btn-primary my-5 mx-2 btn-block btn-lg" href="index.php?controller=AdminClients&action=add" role="button">Ajouter un item</a>
    </div>';



    $table.= "<h5> Base de données - Utilisateurs -</h5>";
    $table.='
    <div class="row my-5">
    <table class="table my-5">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Article</th>
            <th scope="col">Description</th>
            <th scope="col">Photo</th> 
            <th scope="col">Prix unitaire</th> 
            <th scope="col">Quantité en stock</th> 
            <th scope="col"></th>         
          </tr>
        </thead>
        <tbody>                        
    ';

    foreach($list as $value){
        $table.='
        <tr>        
            <td>'.$value["id_produit"].'</td>
            <td>'.$value["nom_produit"].'</td>
            <td>'.$value["description"].'</td>
            <td>'.$value["photo"].'</td>
            <td>'.$value["prix_unitaire"].'</td>
            <td>'.$value["qte_stock"].'</td>
            <td><a class="btn btn-danger" href="index.php?controller=AdminClients&action=delete&id_produit='.$value["id_produit"].'" role="button">Supprimer</a>
            <a class="btn btn-primary" href="index.php?controller=AdminClients&action=update&id_produit='.$value["id_produit"].'" role="button">Modifier</a>
            </td>

        <tr>';
    

    }

    $table.='                       
        </tbody>
        </table>
        </div>';

    $this->page.=$table;
    $this->display();

}
//--------------------------------------------------------------------------------------------------------------------------------------
private function displayForm($id_produit,$nom,$description,$photo,$prix,$qte,$action,$read){

    $this->page.=$this->searchHTML("html/formClient.html");

    $this->page=str_replace("{{action}}",$action,$this->page);
    $this->page=str_replace("{{id_produit}}",$id_produit,$this->page);
    $this->page=str_replace("{{nom}}",$nom,$this->page);
    $this->page=str_replace("{{description}}",$description,$this->page);
    $this->page=str_replace("{{photo}}",$photo,$this->page);
    $this->page=str_replace("{{prix}}",$prix,$this->page);
    $this->page=str_replace("{{qte}}",$photo,$this->page);
    $this->page=str_replace("{{read}}",$read,$this->page);
    $this->display();
}
//--------------------------------------------------------------------------------------------------------------------------------------
public function displayAdd(){

    $this->displayForm("","","","","","","ajouter","");

}
//--------------------------------------------------------------------------------------------------------------------------------------
public function displayUpdate($item){
        
    $this->displayForm($item['id_produit'],$item['nom'],$item['description'],$item['photo'],$item['prix'],$item['qte'],"modifier","");
}
//--------------------------------------------------------------------------------------------------------------------------------------
public function displayDelete($item){

    $this->displayForm($item['id_produit'],$item['nom'],$item['description'],$item['photo'],$item['prix'],$item['qte'],"supprimer","readonly");

}

//--------------------------------------------------------------------------------------------------------------------------------------



}