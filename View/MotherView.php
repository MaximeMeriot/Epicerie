<?php


abstract class MotherView{

    protected $page;
//--------------------------------------------------------------------------------------------------------------------------------------
    function __construct(){
        $this->page=$this->searchHtml("html/header.html");
        $this->page.=$this->searchHtml("html/nav.html");

        if(isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&isset($_SESSION['societe'])){

            $this->page = str_replace("{{utilisateur}}",$_SESSION['nom'].' '.$_SESSION['prenom'].' de la société '.$_SESSION['societe'],$this->page);
        }else{
            $this->page = str_replace("{{utilisateur}}","Anomyme",$this->page);

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