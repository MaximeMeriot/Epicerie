<?php
class HistoryController extends MotherController {

    private $historyModel;
    private $historyView;

    public function __construct(){
        $this->model= new HistoryModel();
        $this->view= new HistoryView();
    }

}