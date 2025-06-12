<?php 
require_once "./../repository/Repository.php";
require_once "./../entity/Transaction.php";

class TransactionRepository extends Repository{
    public function selectAll(int $compteId,int $offset,int $limit):array{
       //1-Connexion a Mysql
    try {
        $sql="select * from transaction  where compte_id=$compteId LIMIT $offset,$limit";
         $cursor=$this->pdo->query($sql);
         $transactions=[];
        while ($row=$cursor->fetch()) {
         //4-Convertir statement ou cursor en tableau de compte
           $transactions[]=$this->convert($row);
        }
        return  $transactions;

    } catch (PDOException $ex) {
         print $ex->getMessage()."\n";
    }
      return [];
      
    }
    protected function convert($row):Transaction{
        $transaction=new Transaction();
        $transaction->setId($row["id"]);
        $transaction->setMontant($row["montant"]);
        $transaction->setType($row["type"]);
        $transaction->setCompteId($row["compte_id"]);
        $transaction->setDate(new DateTime($row["date"]));
        return  $transaction;
    }

    public function selectCount(int $compteId):int{
        try {
            $sql="SELECT count(id) as count FROM `transaction` where compte_id=$compteId ";
             $cursor=$this->pdo->query($sql);
              if($row=$cursor->fetch()){
                return $row["count"];
              }
             
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }
        return 0;
    }

    public function sumMontantByType(int $compteId,string $type ):float{
        try {
            $sql="SELECT sum(montant) as total FROM `transaction` where compte_id=$compteId and type='$type'";
             $cursor=$this->pdo->query($sql);
              if($row=$cursor->fetch()){
                return $row["total"]??0;
              }
             
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }
        return 0;
    }

    public function insert(Transaction $transaction):int{
        try {
            $montant=$transaction->getMontant();
            $type=$transaction->getType();
            $date=$transaction->getDate()->format("Y-m-d");
            $compteId=$transaction->getCompteId();
            $sql="INSERT INTO `transaction` (`montant`, `type`, `date`,compte_id) VALUES ($montant, '$type', '$date','$compteId')";
             return $this->pdo->exec($sql);
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }
        return 0;
    }
}