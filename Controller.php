<?php

include 'View.php';
include 'Model.php';

class Controller {

    private $view;
    private $model;


    public function __construct(){
        /*
        * On instancie notre View/Model
        */ 
        $this->view = new View();
        $this->model = new Model();
    }


    public function dispatch() {

    }

}