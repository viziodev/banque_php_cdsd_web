<?php 
namespace App\Controllers;

use App\Config\Controller;

class DashboardController extends Controller{

    public  function __construct(){
        parent::__construct();
        $this->onLoadAction();
     }

     public function onLoadAction(){
        $action=$_REQUEST["action"]??"list";
        switch ($action) {
           case 'list':
             $this->list();
             break;
          
           break;
           default:
     # code...
         break;
     }
     }


     public function list(){
        $this->renderView("dashboard/list.html.php");
}
    }