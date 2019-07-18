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
        $this->view->displayValid();
        $this->model->sendMail();
    }

}
