<?php
require_once "./../services/CompteService.php";
require_once "./../services/TransactionService.php";
require_once "./../controllers/Controller.php";
class TransactionController extends Controller{
   private CompteService $compteService;
   private TransactionService $transactionService;
     public  function __construct(){
        if(!isset($_REQUEST['id'])){
           header("location:index.php?controller=compte&action=list");
           exit;
        }
        $this->compteService=new CompteService();
        $this->transactionService=new TransactionService();
        $this->onLoadAction();
     }

     public function onLoadAction(){
      $action=$_REQUEST["action"]??"list";
      switch ($action) {
      case 'list':
           $this->list();
           break;
           case 'form':
           $this->loadForm();
           case 'create':
            $this->create();
           break;
         break;
      default:
   # code...
       break;
    }
   }

   /*
      Diagramme de classe ==> MLD
      Classe                   Table  NB: Lorsqu'on a l'heritage seule la classe mere devient une table
      Enumeration         ==>   Devienne une colonne  d'une table de type enumeration
      Relation            ==>   Deviennent table ou  colonne  d'une table appelee cle etrangere

      ?..1-->?..x         ==>   Devient une cle etrangere qui migre du one vers le many
      ?..x-->?..x         ==>   Devient une table association
      ?..1--?..1          ==>   Peut Devenir une  OneToMany ou ManyToMany
   
   */
  public function create(){
  
        $compteId=$_REQUEST['id'];
        $type=$_REQUEST['type'];
        $montant=$_REQUEST['montant'];

        //2-Validation des Donnees
        //3-Enregistrer la transaction
           $transaction=new Transaction();
           $transaction->setType($type);
           $transaction->setMontant($montant);
           $transaction->setCompteId($compteId);
           $this->transactionService->addTransaction($transaction);
           header("location:index.php?controller=transaction&action=list&id=$compteId");
  } 
    
   private function getCompteByRequest():Compte{
        $compteId=$_REQUEST['id'];
        $compte= $this->compteService->getCompteById($compteId);
        if ($compte==null) {
         $message="Aucun compte ne correspond a cet identifiant";
         header("location:index.php?controller=compte&action=list");
         exit;
       }
       return $compte;
   }
     public function list(){
             $compte=$this->getCompteByRequest();
            $transactions= $this->transactionService->getTransactionByCompteId($compte->getId());
            $statistiques=$this->transactionService->getStatistiques($compte->getId());
            $this->renderView("transaction/list.html.php",[
               "compte"=> $compte,
               "transactions"=> $transactions,
               "statistiques"=>$statistiques
            ]);
   }
   public function loadForm(){
      $compte=$this->getCompteByRequest();
      $this->renderView("transaction/create.html.php",[
         "compte"=> $compte,
      ]);
}
}