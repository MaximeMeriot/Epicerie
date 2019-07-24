<?php
class ConnectController extends MotherController {

    private $connectModel;
    private $connectView;

    public function __construct(){
        $this->model= new ConnectModel();
        $this->view= new ConnectView();
    }

    public function loginAction() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            if($_SESSION['admin']) {
                $this->view->displayConnexionOkAdmin($_SESSION['prenom']);
            }
            else {
                $this->view->displayConnexionOkClient($_SESSION['prenom']);
            }
        }
        else {
            $this->view->displayLogin();
        }
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
            if($liste['admin'] == "1") {
                $this->view->displayConnexionOkAdmin($liste['prenom_client']);

                session_start([
                    'cookie_lifetime' => 3600,
                ]); 
                $_SESSION['admin'] = true;
                
            }
            else {
            $this->view->displayConnexionOkClient($liste['prenom_client']);
            if(!isset($_SESSION)) { 
            session_start([
                'cookie_lifetime' => 3600,
            ]); 
            }
            $_SESSION['admin'] = false;
            }
            $_SESSION['email'] = $liste['email'];
            $_SESSION['nom'] = $liste['nom_client'];
            $_SESSION['prenom'] = $liste['prenom_client'];
            $_SESSION['societe'] = $liste['societe'];
            $_SESSION['id'] = $liste['id_client'];
        }
        else {
            $this->view->displayConnexionNok();
        }

    }

    public function unauthorizedAction(){
        $this->view->displayUnauthorized();
    }

    public function deconnexionAction() {
        
$this->view->displayLogin();
        // $this->view->displayLogout();
    }

    public function redirectDeconnexionAction(){

        $_SESSION = array();
       
// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 3600,
		    $params["path"], $params["domain"],
		    $params["secure"], $params["httponly"]
	);
}

// Finalement, on détruit la session. 
session_destroy();
session_unset();

        header('Location: index.php?controller=Connect&action=deconnexion');
    }
}