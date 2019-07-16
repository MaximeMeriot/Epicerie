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
        $email = $_POST['email'];
        $mdp = $_POST['nom'];
        $this->model->addClient($nom, $prenom, $societe, $email, $mdp);
    }
}