<?php
class HistoryController extends MotherController {

    private $historyModel;
    private $historyView;

    public function __construct(){
        $this->model= new HistoryModel();
        $this->view= new HistoryView();
    }

    public function listAction(){
        $getList = $this->model->getList();
        if(!($getList == 0)) {

        
        $this->view->displayList($getList);
    }
    else {
        $this->view->noDisplayList();
    }

    }

}

