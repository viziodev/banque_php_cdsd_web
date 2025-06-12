<?php


 
   $controller=$_REQUEST["controller"]??"user";
       switch ($controller) {
        case 'user':
          require_once "./../controllers/UserController.php";
          $controller=new UserController();
          break;
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
