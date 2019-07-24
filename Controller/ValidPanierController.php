<?php

class ValidPanierController extends MotherController
{
    private $view;
    private $model;


    function __construct()
    {
        /*
        * On instancie notre View/Model
        */
        $this->view = new ValidPanierView();
        $this->model = new ValidPanierModel();
    }

    public function validPanierAction()
    {
        var_dump($_SESSION['id']);
        if(!isset($_SESSION['id'])) {
            header('Location: index.php?controller=Connect&action=deconnexion');
            return;
        }
        else {  
        
        if ($this->model->checkCart()) {
            $this->view->displayValid();
            $this->model->sendMail();
        }
         else {
            $this->view->displayError();
        }
        
        $this->model->validCommande($this->model->getPanier(), $_SESSION['id']);
        $this->model->jsonFile($this->model->getPanier());
    }
    }

}
