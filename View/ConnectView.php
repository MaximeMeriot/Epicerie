<?php


class ConnectView extends MotherView{

    public function displayLogin(){

    $this->page .= file_get_contents('html/login.html');
    $this->display();
    }

    public function displayRegister(){
        $this->page .= file_get_contents('html/register.html');
        $this->display();
    }
}