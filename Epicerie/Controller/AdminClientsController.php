<?php



class AdminClientsController {

    private $model;
    private $view;

    public function __construct(){

        $this->model= new AdminClientsModel();
        $this->view= new AdminClientsView();

    }
//-------------------------------------------------------------------------------------------------------------------------
    public function listAction(){

        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function addAction(){
        
        $this->view->displayAdd();        
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function updateAction(){

        $this->view->displayUpdate($this->model->getItem($_GET['id_client']));
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function deleteAction(){

        $this->view->displayDelete($this->model->getItem($_GET['id_client']));
    }

//-------------------------------------------------------------------------------------------------------------------------
    public function ajouterAction(){
    
        $this->model->addItem($_POST['nom_client'],$_POST['prenom_client'],$_POST['societe'],$_POST['mdp'],$_POST['email'],$_POST['admin']);
        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function modifierAction(){

        $this->model->updateItem($_POST['id_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['societe'],$_POST['mdp'],$_POST['email'],$_POST['admin']);
        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function supprimerAction(){

        $this->model->deleteItem($_POST['id_client']);
        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------


}