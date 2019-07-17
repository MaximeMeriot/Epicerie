<?php

class CartController extends MotherController 
{
    private $view;
    // private $model;


    function __construct()
    {
        /*
        * On instancie notre View/Model
        */
        $this->view = new CartView();
        // $this->model = new ListModel();
    }
    public function cartAction()
    {
        $this->view->displayCart("","name","lorem",20,1);
    }
}
