<?php
require_once "./../controllers/Controller.php";
require_once "./../services/CompteService.php";
require_once "./../services/UserService.php";
class CompteController extends Controller{
   private CompteService $compteService;
   private UserService $userService;
    public  function __construct(){
        parent::__construct();
        $this->compteService=new CompteService();
        $this->userService=new UserService();
        $this->onLoadAction();
        
     }

   public function list(){
               $currentPage=$_REQUEST['page']??1; 
               $clientId=$_SESSION['user']['role']=="CLIENT"?$_SESSION['user']['id']:null;
               $comptes=$this->compteService->getComptes($clientId,$_GET['titulaire']??"",$currentPage);
               $nbrePage=$this->compteService->getNbrePage();
               $data=[
                "comptes"=>  $comptes,
                "nbrePage"=>   $nbrePage,
                "currentPage"=>$currentPage
               ];
               $this->renderView("compte/list.html.php", $data);
              
   }

   public function loadForm(){
            $clients=$this->userService->getClients();
           $this->renderView("compte/create.html.php",[
              "clients"=> $clients
           ]);
   }

   public function create(){
      // $titulaire=$_POST['titulaire'];//$_REQUEST['titulaire']
      // $solde=$_POST['solde'];
        extract($_POST);
       //1-Valider les donnees
       if($this->validator->isEmpty($titulaire,'titulaire',"Veuillez Selectionner un client")) unset($_POST['titulaire']) ;
       if(!$this->validator->isNumber((int)$solde,'solde',"Montant minimum : 10 000 FCFA")) unset($_POST['solde']);
       //2-Si Donnee sont valides alors on les envoient au service
       if ($this->validator->isValid()){  
            $compte=new Compte();
            $compte->setNumero($this->compteService->generateNumero());
            $compte->setTitulaire($titulaire);
            $compte->setSolde($solde);
            if($this->compteService->addCompte($compte)){
              // $_SESSION['sucess']="Le compte a ete cree avec success";
               header("location:index.php?controller=compte&action=list");
               exit;
            }
        }else{
         $_SESSION['errors']=$this->validator->getErrors();
         $_SESSION['data']=$_POST;
            header("location:index.php?controller=compte&action=form");
         exit;
        }
    }

  public function onLoadAction(){
       $action=$_REQUEST["action"]??"list";
       switch ($action) {
       case 'list':
            $this->list();
            break;
            case 'form':
            $this->loadForm();
          break;
          case 'create':
            $this->create();
          break;
       default:
    # code...
        break;
 }
    }
}