<?php



class AdminCommandesController {

    private $model;
    private $view;

    public function __construct(){

        $this->model= new AdminCommandesModel();
        $this->view= new AdminCommandesView();

    }
//-------------------------------------------------------------------------------------------------------------------------
    public function listAction(){

        $this->view->displayList($this->model->getList());
    }

}