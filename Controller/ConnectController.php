<?php
class ConnectController extends MotherController {

    private $connectModel;
    private $connectView;

    public function __construct(){
        $this->model= new ConnectModel();
        $this->view= new ConnectView();
    }

    public function loginAction() {
        $this->view->displayLogin();
    }

    public function registerAction() {
        $this->view->displayRegister();
    }

    public function addClientAction(){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $societe = $_POST['societe'];
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $this->model->addClient($nom, $prenom, $societe, $hash, $email);
        $this->view->displayRegisterOk();
    }

    public function testLoginAction(){
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $liste = $this->model->testLogin($email);
        if($liste['mdp'] == $hash){
            $this->view->displayConnexionOk($liste['prenom']);
        }
        else {
            $this->view->displayConnexionNok();
            var_dump($liste['mdp']);
            var_dump($hash);
        }

    }
}