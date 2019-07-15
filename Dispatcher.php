<?php





class Dispatcher{


    public function dispatch(){

        $controller=(isset($_GET['controller']))?$_GET['controller']:"Home";
        $controller=$controller."Controller";

        $action=(isset($_GET['action']))?$_GET['action']:"show";
        $action=$action."Action";

        $my_controller=new $controller();
        $my_controller->$action();

    }



}