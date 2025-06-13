<?php 
require_once "./../controllers/Controller.php";
require_once "./../services/UserService.php";
class UserController extends Controller{
    private UserService $userService;
     public  function __construct(){
        parent::__construct();
        $this->userService=new UserService();
        $this->onLoadAction();
        
         
      }

      protected function onLoadAction(){
        $action=$_REQUEST["action"]??"form";
        switch ($action) {
        case 'logout':
             $this->logout();
             break;
             case 'form':
             $this->loadForm();
           break;
           case 'login':
             $this->login();
           break;
        default:
     # code...
         break;
  }
     }

     public function loadForm(){
        require_once "./../views/user/login.html.php";
     }
     public function login(){
        //1-Recuperation des donnees de la requete
           extract($_REQUEST);
        //2-Validation des donnees
              $this->validator->isEmpty($login,'login',"Login est obligatoire");
              $this->validator->isEmail($login,'login',"Login  doit etre un email");
              $this->validator->isEmpty($password,'password',"Montant minimum : 1 000 FCFA");

         //Donnees Valides
           if ($this->validator->isValid()){
            //3-Authentification
              $user=$this->userService->seConnecter($login,$password);
              if ($user==null) {
               $this->validator->addErrors('connexion',"Login ou Mot de passe Incorrect");
                $_SESSION['errors']=$this->validator->getErrors();
              header("location:index.php");
               exit;
            }
            /* 
                Dans une session on peut stocker des donnees de types
                    -prmitifs 
                    -Tableau
            */
            $_SESSION['user']=$user->toArray();
            header("location:index.php?controller=compte&action=list");
            exit;
       }else{
            $_SESSION['errors']=$this->validator->getErrors();
            header("location:index.php");
            exit;
       }
         
        
     }
     public function logout(){
        //Traitements de Deconnexion
           session_unset();
           session_destroy();
           header("location:index.php");
            exit;
     }
}