<?php 
namespace App\Repository;
use App\Entity\User;
use App\Config\Repository;

class UserRepository extends Repository {
        
    public function selectByLoginAndPassword(string $login,string $password):User|null{
            $sql="select * from user where login=? and password=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$login,$password]);
              if($row=$stmt->fetch()){
                    return $this->convert($row);
              }
            return null;
    }

    public function selectByRole(string $role="CLIENT"):array{
            $sql="select * from user where role=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$role]);
              $users=[];
              while($row=$stmt->fetch()){
                $users[]=$this->convert($row);
              }
              return   $users;
    }
    protected function convert($row):User{
        $user=new User();
         $user->setId($row["id"]);
         $user->setNomComplet($row["nomComplet"]);
         $user->setLogin($row["login"]);
         $user->setPassword($row["password"]);
         $user->setRole($row["role"]);
        return  $user;
    }
}