<?php 
require_once "./../entity/Compte.php";
require_once "./../repository/CompteRepository.php";
class CompteService{
   private CompteRepository $compteRepository;
   private const LIMIT=4;
   public function __construct()
   {
       $this->compteRepository =new CompteRepository();
   }

    public function addCompte(Compte $compte):bool{
        return $this->compteRepository->insert($compte)!=0;
    }

    /**
     * Get the value of comptes
     */
    public function getComptes(string $titulaire="",int $page=1): array
    {
          //page=1 ==> $offset=(1-1)*4=0 ==>  ,int $limit=4   
          //page=2 ==> $offset=(2-1)*4=4   ==> ,int $limit=4
          //page=3 ==> $offset=(3-1)*4=8 ,int $limit=4
          //page=3 ==> $offset=(4-1)*4=12 ,int $limit=4

          $offset =($page-1)*self::LIMIT ;
          return $this->compteRepository->selectAll($titulaire,$offset,self::LIMIT);
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