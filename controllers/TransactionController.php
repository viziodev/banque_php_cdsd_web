<?php
require_once "./../controllers/Controller.php";
class TransactionController extends Controller{
     public  function __construct(){
        $this->onLoadAction();
     }

     public function onLoadAction(){
      $action=$_REQUEST["action"]??"list";
      switch ($action) {
      case 'list':
           $this->list();
           break;
           break;
           case 'create':
           $this->create();
           break;
         break;
      default:
   # code...
       break;
    }
   }
    
     public function list(){
           $this->renderView("transaction/list.html.php");
   }
   public function create(){
      $this->renderView("transaction/create.html.php");
}
}