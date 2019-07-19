<?php





class Dispatcher{


    public function dispatch(){



        $controller=(isset($_GET['controller'])&&(isset($_SESSION)))?$_GET['controller']:"Connect";
        $controller=$controller."Controller";


        $action=(isset($_GET['action'])&&(isset($_SESSION)))?$_GET['action']:"login";
        $action=$action."Action";

        $my_controller=new $controller();
        $my_controller->$action();
        }
    }



