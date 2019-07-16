<?php

class ListController extends MotherController
{

    private $view;
    private $model;


    public function __construct()
    {
        /*
        * On instancie notre View/Model
        */
        $this->view = new ListView();
        $this->model = new ListModel();
    }

    public function listAction()
    {
        $list = $this->model->getList('Produit');
        $this->view->DisplayList($list);
       
    }

}


