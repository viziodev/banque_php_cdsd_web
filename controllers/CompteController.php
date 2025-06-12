<?php
require_once "./../services/CompteService.php";
require_once "./../controllers/Controller.php";
class CompteController extends Controller{
   private CompteService $compteService;
    public  function __construct(){
        parent::__construct();
        $this->compteService=new CompteService();
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
           $this->renderView("compte/create.html.php");
   }

   public function create(){
      // $titulaire=$_POST['titulaire'];//$_REQUEST['titulaire']
      // $solde=$_POST['solde'];
        extract($_POST);
       //1-Valider les donnees
       //2-Si Donnee sont valides alors on les envoient au service
       $compte=new Compte();
       $compte->setNumero($this->compteService->generateNumero());
       $compte->setTitulaire($titulaire);
       $compte->setSolde($solde);
       $errorMessage="";
       if($this->compteService->addCompte($compte)){
           $errorMessage="Le compte a ete cree avec success";
       }
       //redirection
       header("location:index.php?controller=compte&action=list");
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