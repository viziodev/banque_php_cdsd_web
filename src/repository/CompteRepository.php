<?php 
namespace App\Repository;
use App\Entity\Compte;
use App\Config\Repository;

class CompteRepository extends Repository{
   
    public function selectAll(int|null $clientId,string $titulaire,int $offset,int $limit):array{
       //1-Connexion a Mysql
         $where="where c.user_id=u.id";
         $data=[];
         if($clientId!=null){
              $where.=" and user_id=? ";
              $data[]=$clientId;
         }
         if (!empty($titulaire)) {
              $where.=" and titulaire like ? ";
              $data[]=$titulaire;
         }
         $sql="select c.*,u.nomComplet as titulaire FROM `compte` c , user u  $where LIMIT $offset,$limit";
        //2-Execute la requete
         $cursor=$this->pdo->prepare($sql);
         $cursor->execute($data);

       //3-Recuperer les resultats sous form de cursor ou statement
         $comptes=[];
        while ($row=$cursor->fetch()) {
         //4-Convertir statement ou cursor en tableau de compte
           $comptes[]= $this->convert($row);
        }
        return  $comptes;
      
    }

    public function insert(Compte $compte):int{
            $solde=$compte->getSolde();
            $numero=$compte->getNumero();
            $titulaire=$compte->getTitulaire();
            $dateCreation=$compte->getDateCreation()->format("Y-m-d");
            $sql="INSERT INTO `compte` (`solde`, `numero`, `dateCreation`,user_id) VALUES (?, ?, ?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$solde,$numero,$dateCreation,$titulaire]);
            return $stmt->rowCount();
    }

    public function update(int $compteId,float $solde):int{
       
             $sql="UPDATE `compte` SET `solde` = ? WHERE `compte`.`id` = ?;";
             $stmt = $this->pdo->prepare($sql);
             $stmt->execute([$solde,$compteId]);
             return $stmt->rowCount();
       
      
    }
    public function selectById(int $id):Compte|null{
     
            $sql="select c.*,u.nomComplet as titulaire FROM `compte` c , user u where c.user_id=u.id and c.id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
              if($row=$stmt->fetch()){
                    return $this->convert($row);
              }
        
        return null;
    }

    public function selectMaxId():int{
            $sql="SELECT max(id) as lastId FROM `compte`";
            //2-Execute la requete
             $cursor=$this->pdo->query($sql);
            //3-Recuperer les resultats sous form de cursor ou statement 
              $row=$cursor->fetch();
             //4-Convertir statement ou cursor en tableau de compte
              return $row["lastId"];
    }
    public function selectCount():int{
            $sql="SELECT count(id) as count FROM `compte`";
            //2-Execute la requete
             $cursor=$this->pdo->query($sql);
            //3-Recuperer les resultats sous form de cursor ou statement 
              $row=$cursor->fetch();
             //4-Convertir statement ou cursor en tableau de compte
              return $row["count"]; 
    }

    protected function convert($row):Compte{
        $compte=new Compte();
        $compte->setId($row["id"]);
        $compte->setSolde($row["solde"]);
        $compte->setNumero($row["numero"]);
        $compte->setTitulaire($row["titulaire"]);
        $compte->setDateCreation(new \DateTime($row["dateCreation"]));
        return  $compte;
    }
}