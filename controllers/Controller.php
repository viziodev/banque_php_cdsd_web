<?php

abstract class Controller{
    public abstract function onLoadAction();

    protected  function renderView($path,array $data=[]){
        extract($data);
       
        require_once "./../views/layout/header.html.php";
        require_once "./../views/$path";
        require_once "./../views/layout/footer.html.php";
     }
}