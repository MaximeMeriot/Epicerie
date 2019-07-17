<?php
session_start();
// session_destroy();

include "includes.php";


$dispatcher= new Dispatcher();
$dispatcher->dispatch();
