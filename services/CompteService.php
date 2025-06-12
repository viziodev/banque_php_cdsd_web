<?php 
require_once "./../entity/Compte.php";
require_once "./../repository/CompteRepository.php";
require_once "./../repository/TransactionRepository.php";
class CompteService{
   private CompteRepository $compteRepository;
   private TransactionRepository $transactionRepository;
   private const LIMIT=4;
   public function __construct()
   {
       $this->compteRepository =new CompteRepository();
       $this->transactionRepository =new TransactionRepository();
       
   }
    public function addCompte(Compte $compte):bool{
         $result= $this->compteRepository->insert($compte);
         if($result==0) {
            return false;
         }
        $transaction=new Transaction();
        $transaction->setType("DEPOT");
        $transaction->setMontant($compte->getSolde());
        $compteId=$this->compteRepository->selectMaxId();
        $transaction->setCompteId($compteId);
        return $this->transactionRepository->insert($transaction)!=0;

    }
    /**
     * Get the value of comptes
     */
    public function getComptes(int|null $clientId,string $titulaire="",int $page=1): array
    {
          //page=1 ==> $offset=(1-1)*4=0 ==>  ,int $limit=4   
          //page=2 ==> $offset=(2-1)*4=4   ==> ,int $limit=4
          //page=3 ==> $offset=(3-1)*4=8 ,int $limit=4
          //page=3 ==> $offset=(4-1)*4=12 ,int $limit=4

          $offset =($page-1)*self::LIMIT ;
          return $this->compteRepository->selectAll($clientId,$titulaire,$offset,self::LIMIT);
    }
    public function getCompteById(int $id): Compte|null
    {
          return $this->compteRepository->selectById($id);
    }
    public function generateNumero(): string
    {
       $lastId=$this->compteRepository->selectMaxId()+1;   
       return "NUM_ $lastId";
    }

    public function getNbrePage(): int
    {
        return ceil($this->compteRepository->selectCount()/self::LIMIT);
    }

    
}