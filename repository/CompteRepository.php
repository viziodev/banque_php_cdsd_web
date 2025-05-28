<?php 
require_once "./../entity/Compte.php";
class CompteRepository{

    public function selectAll(string $titulaire,int $offset,int $limit):array{
       //1-Connexion a Mysql
    try {
         $where="";
         if (!empty($titulaire)) {
            $where="where titulaire like '$titulaire' ";
         }
        $sql="select * from compte   $where LIMIT $offset,$limit";
        $server = 'localhost:8889';
        $dbname = 'banque_glrs_cdsa_mae_2025';
        $username = 'root';
        $password = 'root';
        $charset = 'utf8mb4';
        $chaineConnexion = "mysql:host=$server;dbname=$dbname;charset=$charset";
         $pdo = new PDO($chaineConnexion, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         ]);

        //2-Execute la requete
         $cursor=$pdo->query($sql);
       //3-Recuperer les resultats sous form de cursor ou statement
         $comptes=[];
        while ($row=$cursor->fetch()) {
         //4-Convertir statement ou cursor en tableau de compte
           $compte=new Compte();
           $compte->setId($row["id"]);
           $compte->setSolde($row["solde"]);
           $compte->setNumero($row["numero"]);
           $compte->setTitulaire($row["titulaire"]);
           $compte->setDateCreation(new DateTime($row["dateCreation"]));
           $comptes[]= $compte;
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
            $sql="INSERT INTO `compte` (`solde`, `numero`, `dateCreation`,titulaire) VALUES ($solde, '$numero', '$dateCreation','$titulaire')";
            $server = 'localhost:8889';
            $dbname = 'banque_glrs_cdsa_mae_2025';
            $username = 'root';
            $password = 'root';
            $charset = 'utf8mb4';
            $chaineConnexion = "mysql:host=$server;dbname=$dbname;charset=$charset";
             $pdo = new PDO($chaineConnexion, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             ]);
            //2-Execute la requete
             return $pdo->exec($sql);
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }

        return 0;
    }

    public function selectById(int $id):Compte|null{
        try {
            $sql="select * from compte where id=$id";
            $server = 'localhost:8889';
            $dbname = 'banque_glrs_cdsa_mae_2025';
            $username = 'root';
            $password = 'root';
            $charset = 'utf8mb4';
            $chaineConnexion = "mysql:host=$server;dbname=$dbname;charset=$charset";
             $pdo = new PDO($chaineConnexion, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             ]);
    
            //2-Execute la requete
             $cursor=$pdo->query($sql);
            //3-Recuperer les resultats sous form de cursor ou statement 
              $row=$cursor->fetch();
             //4-Convertir statement ou cursor en tableau de compte
               $compte=new Compte();
               $compte->setId($row["id"]);
               $compte->setSolde($row["solde"]);
               $compte->setNumero($row["numero"]);
               $compte->setDateCreation(new DateTime($row["dateCreation"]));
              return $compte;
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }

        return null;
    }

    public function selectMaxId():int{
        try {
            $sql="SELECT max(id) as lastId FROM `compte`";
            $server = 'localhost:8889';
            $dbname = 'banque_glrs_cdsa_mae_2025';
            $username = 'root';
            $password = 'root';
            $charset = 'utf8mb4';
            $chaineConnexion = "mysql:host=$server;dbname=$dbname;charset=$charset";
             $pdo = new PDO($chaineConnexion, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             ]);
    
            //2-Execute la requete
             $cursor=$pdo->query($sql);
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
            $server = 'localhost:8889';
            $dbname = 'banque_glrs_cdsa_mae_2025';
            $username = 'root';
            $password = 'root';
            $charset = 'utf8mb4';
            $chaineConnexion = "mysql:host=$server;dbname=$dbname;charset=$charset";
             $pdo = new PDO($chaineConnexion, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             ]);
    
            //2-Execute la requete
             $cursor=$pdo->query($sql);
            //3-Recuperer les resultats sous form de cursor ou statement 
              $row=$cursor->fetch();
             //4-Convertir statement ou cursor en tableau de compte
              return $row["count"];
        } catch (PDOException $ex) {
             print $ex->getMessage()."\n";
        }

        return 0;
    }
}