<?php



class AdminProduitsController {

    private $model;
    private $view;

    public function __construct(){

        $this->model= new AdminProduitsModel();
        $this->view= new AdminProduitsView();

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

        $this->view->displayUpdate($this->model->getItem($_GET['id_produit']));
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function deleteAction(){

        $this->view->displayDelete($this->model->getItem($_GET['id_produit']));
    }

//-------------------------------------------------------------------------------------------------------------------------
    public function ajouterAction(){
    
        $this->model->addItem($_POST['nom'],$_POST['description'],$_POST['photo'],$_POST['prix'],$_POST['qte']);
        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function modifierAction(){

        $this->model->updateItem($_POST['id_produit'],$_POST['nom'],$_POST['description'],$_POST['photo'],$_POST['prix'],$_POST['qte']);
        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------
    public function supprimerAction(){

        $this->model->deleteItem($_POST['id_produit']);
        $this->view->displayList($this->model->getList());
    }
//-------------------------------------------------------------------------------------------------------------------------


}