<?php
class ConnectController extends MotherController {

    private $connectModel;
    private $connectView;

    public function __construct(){
        $this->model= new ConnectModel();
        $this->view= new ConnectView();
    }

    public function loginAction() {
        $this->view->displayLogin();
    }

    public function registerAction() {
        $this->view->displayRegister();
    }
}