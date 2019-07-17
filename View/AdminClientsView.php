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



    $table.= "<h5> Base de données - Clients -</h5>";
    $table.='
    <div class="row my-5 table-responsive">
    <table class="table my-5">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Société</th> 
            <th scope="col">Mot de passe</th> 
            <th scope="col">E-mail</th> 
            <th scope="col">Administrateur</th>
            <th scope="col"></th>     
            <th scope="col"></th>     
          </tr>
        </thead>
        <tbody>                        
    ';

    foreach($list as $value){
        $table.='
        <tr>        
            <td>'.$value["id_client"].'</td>
            <td>'.$value["nom_client"].'</td>
            <td>'.$value["prenom_client"].'</td>
            <td>'.$value["societe"].'</td>
            <td>'.$value["mdp"].'</td>
            <td>'.$value["email"].'</td>
            <td>'.$value["admin"].'</td>
            <td><a class="btn btn-danger" href="index.php?controller=AdminClients&action=delete&id_client='.$value["id_client"].'" role="button">Supprimer</a></td>
            <td><a class="btn btn-primary" href="index.php?controller=AdminClients&action=update&id_client='.$value["id_client"].'" role="button">Modifier</a></td>
            

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
private function displayForm($id_client,$nom_client,$prenom_client,$societe,$mdp,$email,$admin,$action,$read){

    $this->page.=$this->searchHTML("html/formClients.html");

    $this->page=str_replace("{{action}}",$action,$this->page);
    $this->page=str_replace("{{id_client}}",$id_client,$this->page);
    $this->page=str_replace("{{nom_client}}",$nom_client,$this->page);
    $this->page=str_replace("{{prenom_client}}",$prenom_client,$this->page);
    $this->page=str_replace("{{societe}}",$societe,$this->page);
    $this->page=str_replace("{{mdp}}",$mdp,$this->page);
    $this->page=str_replace("{{email}}",$email,$this->page);
    $this->page=str_replace("{{admin}}",$admin,$this->page);
    $this->page=str_replace("{{read}}",$read,$this->page);
    $this->display();
}
//--------------------------------------------------------------------------------------------------------------------------------------
public function displayAdd(){

    $this->displayForm("","","","","","","","ajouter","");

}
//--------------------------------------------------------------------------------------------------------------------------------------
public function displayUpdate($item){
        
    $this->displayForm($item['id_client'],$item['nom_client'],$item['prenom_client'],$item['societe'],$item['mdp'],$item['email'],$item['admin'],"modifier","");
}
//--------------------------------------------------------------------------------------------------------------------------------------
public function displayDelete($item){

    $this->displayForm($item['id_client'],$item['nom_client'],$item['prenom_client'],$item['societe'],$item['mdp'],$item['email'],$item['admin'],"supprimer","readonly");

}

//--------------------------------------------------------------------------------------------------------------------------------------



}