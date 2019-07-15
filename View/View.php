<?php

class View {
    private $pageHTML;
 
    public function __construct() {
        $this->pageHTML = file_get_contents("html/header.html"); //INCLUSION DU HEADER
    }

    public function displayHome(){
        $this->pageHTML .="<h1 class='text-center'>Page d'accueil</h1>";
        $this->displayPage();
    }

    public function displayPage(){
        $this->pageHTML .= "</div>";
        $this->pageHTML .= file_get_contents("html/footer.html"); //INCLUSION DU FOOTER
        echo $this->pageHTML;
    } 
}