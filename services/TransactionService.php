<?php 
require_once "./../entity/Transaction.php";
require_once "./../repository/TransactionRepository.php";
require_once "./../repository/CompteRepository.php";
class TransactionService{
   private TransactionRepository $transactionRepository;
   private CompteRepository $compteRepository;
   private const LIMIT=4;
   public function __construct()
   {
       $this->transactionRepository =new TransactionRepository();
       $this->compteRepository =new CompteRepository();
   }

    /**
     * Get the value of comptes
     */
    public function getTransactionByCompteId(int $compteId,int $page=1): array
    {
          $offset =($page-1)*self::LIMIT ;
          return $this->transactionRepository->selectAll($compteId,$offset,self::LIMIT);
    }

    public function getStatistiques(int $compteId): array
    {
      return[
          "nbreTransaction" =>$this->transactionRepository->selectCount($compteId),
          "totalDepot" =>$this->transactionRepository->sumMontantByType($compteId,"DEPOT"),
          "totalRetrait" =>$this->transactionRepository->sumMontantByType($compteId,"RETRAIT")
      ]; 
    }


    public function addTransaction(Transaction $transaction):bool{
          $result=$this->transactionRepository->insert($transaction);
          if($result==0) {
            return false;
           }
           $compte=$this->compteRepository->selectById($transaction->getCompteId());
          if ($transaction->getType()=="DEPOT") {
              $soldeApres= $compte->getSolde()+$transaction->getMontant();
          }else{
            $soldeApres= $compte->getSolde()-$transaction->getMontant();
          }
          return $this->compteRepository->update($transaction->getCompteId(), $soldeApres)!=0;

    }
   

    
}