<?php


 
   $controller=$_REQUEST["controller"]??"compte";
       switch ($controller) {
       case 'compte':
              require_once "./../controllers/CompteController.php";
              $controller=new  CompteController();
            break;
            case 'transaction':
             require_once "./../controllers/TransactionController.php";
             $controller=new  TransactionController();
             break;

             case 'dashboard':
               require_once "./../controllers/DashboardController.php";
               $controller=new  DashboardController();
               break;
       default:
    # code...
        break;
 }
 

  //
