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

        if($_SESSION['admin']){
            $this->view->displayHome();
        }else (header("Location: index.php?controller=Connect&action=unauthorized"));
    }
//-------------------------------------------------------------------------------------------------------------------------


}