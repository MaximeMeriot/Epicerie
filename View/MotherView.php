<?php


abstract class MotherView{

    protected $page;
//--------------------------------------------------------------------------------------------------------------------------------------
    function __construct(){
        $this->page=$this->searchHtml("html/header.html");
        $this->page.=$this->searchHtml("html/nav.html");
        var_dump($_SESSION);
        var_dump(isset($_SESSION['nom']));
        var_dump(isset($_SESSION['prenom']));
        var_dump(isset($_SESSION['societe']));
        if(isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&isset($_SESSION['societe'])){

            $this->page = str_replace("{{utilisateur}}",$_SESSION['nom'].' '.$_SESSION['prenom'].' de la société '.$_SESSION['societe'],$this->page);
            $this->page = str_replace("{{connexionType}}","Déconnexion",$this->page);
        }else{
            $this->page = str_replace("{{connexionType}}","Connexion",$this->page);

        }

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


    
}