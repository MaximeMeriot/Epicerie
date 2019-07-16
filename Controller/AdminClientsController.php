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


}