<?php
class ListController extends MotherController
{
    private $view;
    private $model;
    function __construct()
    {
        /*
        * On instancie notre View/Model
        */
        $this->view = new ListView();
        $this->model = new ListModel();
    }

    public function listAction()
    {
        $list = $this->model->getList();
        $this->view->DisplayList($list);
    
    }

    public function addCompteurAction()
    {   
        $this -> model -> addCompteur($_GET['idProduit']);
        header ('Location: index.php?controller=List&action=list'); 
    }
   
}