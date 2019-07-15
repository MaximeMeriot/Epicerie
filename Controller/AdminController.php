<?php



class Controller {

    private $model;
    private $view;

    public function __construct(){

        $this->model= new AdminModel();
        $this->view= new AdminView();

    }


}