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
        $panier = $this->model->getPanier();
        $this->view->displayPanier($panier);

    }


    public function addCompteurAction()
    {   
        $this -> model -> addCompteur($_GET['id_produit']);
        // header ('Location: index.php?controller=List&action=list'); 
    }
}