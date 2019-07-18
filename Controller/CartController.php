<?php

class CartController extends MotherController 
{
    private $view;
    private $model;


    function __construct()
    {
        /*
        * On instancie notre View/Model
        */
        $this->view = new CartView();
        $this->model = new CartModel();
    }
    public function cartAction()
    {
        // header ('Location: index.php?controller=List&action=list'); 
       $cart = $this->model->panier();
        $this->view->displayData($cart);
    }

}
