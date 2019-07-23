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
        if ($this->model->checkCart()) {
            $this->view->displayValid();
            $this->model->sendMail();
        }
         else {
            $this->view->displayError();
        }
    }


}
