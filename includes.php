<?php

//INCLUSION DES CONTROLLERS 
include "Controller/MotherController.php";
include "Controller/ConnectController.php";
include "Controller/HistoryController.php";

include "Controller/AdminController.php";
include "Controller/AdminClientsController.php";
// include "Controller/AdminStocksController.php";
include "Controller/AdminProduitsController.php";
// include "Controller/AdminCommandesController.php";
include "Controller/CartController.php";
//INCLUSION DES MODELS
include "Model/MotherModel.php";
include "Model/ConnectModel.php";

include "Model/AdminModel.php";
include "Model/AdminClientsModel.php";
// include "Model/AdminStocksModel.php";
include "Model/AdminProduitsModel.php";
include "Model/HistoryModel.php";
// include "Model/AdminCommandesModel.php";


//INCLUSION DES VIEWS
include "View/MotherView.php";
include "View/HistoryView.php";
include "View/ConnectView.php";

include "View/AdminView.php";
include "View/AdminClientsView.php";
// include "View/AdminStocksView.php";
include "View/AdminProduitsView.php";
// include "View/AdminCommandesView.php";

//include shopping cart 
include "View/CartView.php";

include "Dispatcher.php";