<?php



class AdminController {

    private $model;
    private $view;

    public function __construct(){

        $this->model= new AdminModel();
        $this->view= new AdminView();

    }
//-------------------------------------------------------------------------------------------------------------------------
    public function showAction(){
    
        $this->view->displayHome();
    }
//-------------------------------------------------------------------------------------------------------------------------


}