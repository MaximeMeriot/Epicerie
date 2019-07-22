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

        $id=array('2','3');
        $qte=array('10','5');
        $panier=array(
            "id"=> $id,"qte"=>$qte
        );

        $this->model->validCommande($panier, $_SESSION['id']);
    }

}
