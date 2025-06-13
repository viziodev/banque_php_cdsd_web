<?php 
require_once "./../repository/Repository.php";
require_once "./../entity/Compte.php";

class CompteRepository extends Repository{
   
    public function selectAll(int|null $clientId,string $titulaire,int $offset,int $limit):array{
       //1-Connexion a Mysql
    try {
         $where="where c.user_id=u.id";
         if($clientId!=null){
              $where.=" and user_id=$clientId ";
         }
         if (!empty($titulaire)) {
              $where.=" and titulaire like '$titulaire' ";
         }
         $sql="select c.*,u.nomComplet as titulaire FROM `compte` c , user u  $where LIMIT $offset,$limit";
        //2-Execute la requete
         $cursor=$this->pdo->query($sql);
       //3-Recuperer les resultats sous form de cursor ou statement
         $comptes=[];
        while ($row=$cursor->fetch()) {
         //4-Convertir statement ou cursor en tableau de compte
           $comptes[]= $this->convert($row);
        }
        return  $comptes;

    } catch (PDOException $ex) {
         print $ex->getMessage()."\n";
    }

    return [];
      
    }

    public function insert(Compte $compte):int{
        try {
            $solde=$compte->getSolde();
            $numero=$compte->getNumero();
            $titulaire=$compte->getTitulaire();
            $dateCreation=$compte->getDateCreation()->format("Y-m-d");
            $sql="INSERT INTO `compte` (`solde`, `numero`, `dateCreation`,user_id) VALUES ($solde, '$numero', '$dateCreation',$titulaire)";
             return $this->pdo->exec($sql);
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }

        return 0;
    }

    public function update(int $compteId,float $solde):int{
        try {
             $sql="UPDATE `compte` SET `solde` = $solde WHERE `compte`.`id` = $compteId;";
             return $this->pdo->exec($sql);
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }
        return 0;
    }
    public function selectById(int $id):Compte|null{
        try {
            $sql="select c.*,u.nomComplet as titulaire FROM `compte` c , user u where c.user_id=u.id and id=$id";
             $cursor=$this->pdo->query($sql);
              if($row=$cursor->fetch()){
                    return $this->convert($row);
              }
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }
        return null;
    }

    public function selectMaxId():int{
        try {
            $sql="SELECT max(id) as lastId FROM `compte`";
            //2-Execute la requete
             $cursor=$this->pdo->query($sql);
            //3-Recuperer les resultats sous form de cursor ou statement 
              $row=$cursor->fetch();
             //4-Convertir statement ou cursor en tableau de compte
              return $row["lastId"];
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }

        return 0;
    }
    public function selectCount():int{
        try {
            $sql="SELECT count(id) as count FROM `compte`";
            
            //2-Execute la requete
             $cursor=$this->pdo->query($sql);
            //3-Recuperer les resultats sous form de cursor ou statement 
              $row=$cursor->fetch();
             //4-Convertir statement ou cursor en tableau de compte
              return $row["count"];
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }

        return 0;
    }

    protected function convert($row):Compte{
        $compte=new Compte();
        $compte->setId($row["id"]);
        $compte->setSolde($row["solde"]);
        $compte->setNumero($row["numero"]);
        $compte->setTitulaire($row["titulaire"]);
        $compte->setDateCreation(new DateTime($row["dateCreation"]));
        return  $compte;
    }
}