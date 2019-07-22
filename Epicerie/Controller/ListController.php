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
        
        $list = $this->model->getList('Produit');
         $this->model->panierlist();
        $this->view->DisplayList($list);
    
    }

   

}


