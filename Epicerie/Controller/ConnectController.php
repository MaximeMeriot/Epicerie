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
        $liste = $this->model->testLogin($email);
        if (password_verify($mdp, $liste['mdp'])) {
            $this->view->displayConnexionOk($liste['prenom_client']);
            session_start([
                'cookie_lifetime' => 3600,
            ]);
        }
        else {
            $this->view->displayConnexionNok();
            var_dump($liste['mdp']);
            var_dump($mdp);
        }

    }
}