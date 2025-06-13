<?php
  require_once "../vendor/autoload.php";
   $controller=$_REQUEST["controller"]??"user";
       switch ($controller) {
        case 'user':
          $controller=new App\Controllers\UserController();
          break;
         case 'compte':
              $controller=new  App\Controllers\CompteController();
            break;
         case 'transaction':
             $controller=new  App\Controllers\TransactionController();
             break;
         case 'dashboard':
               $controller=new App\Controllers\DashboardController();
               break;
       default:
    # code...
        break;
 }
 

  //
