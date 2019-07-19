<?php


class ConnectView extends MotherView{

    public function displayLogin(){

    $this->page .= file_get_contents('html/login.html');
    $this->display();
    }

    public function displayRegister(){
        $this->page .= file_get_contents('html/register.html');
        $this->display();
    }

    public function displayRegisterOk(){
        $this->page .= "Bien joué ! Il ne vous reste plus qu'à vous <a href='index.php?controller=connect&action=login'>connecter</a>";
        $this->display();
    }

    public function displayConnexionOkClient($prenom){
        header('Location: index.php?controller=List&action=list');
    }

    public function displayConnexionOkAdmin($prenom){
        $this->page .= header('Location: index.php?controller=Admin&action=show');
        $this->display();
    }

    public function displayConnexionNok() {
        $this->page .= file_get_contents('html/login.html');
        $this->page .= "<h5 class='text-center'>Adresse mail ou mot de passe incorrect<h5>";
        $this->display();
    }

    public function displayUnauthorized() {
        $this->page .= "Vous n'êtes pas authorisé à accéder à ce contenu sale ***. Redirigez-vous vers <a href='index.php'>votre interface</a>";
        $this->display();
    }


}
