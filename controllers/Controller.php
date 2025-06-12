<?php

abstract class Controller{
    protected abstract function onLoadAction();

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            //Le tableau $_SESSION est Cree
             session_start();
        }
    }

    protected  function renderView($path,array $data=[]){
        extract($data);
        require_once "./../views/layout/header.html.php";
        require_once "./../views/$path";
        require_once "./../views/layout/footer.html.php";
     }
}