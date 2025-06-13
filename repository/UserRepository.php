<?php 
require_once "./../repository/Repository.php";
require_once "./../entity/User.php";
class UserRepository extends Repository {
        
    public function selectByLoginAndPassword(string $login,string $password):User|null{

            $sql="select * from user where login='$login' and password='$password'";
              $cursor=$this->pdo->query($sql);
              if($row=$cursor->fetch()){
                    return $this->convert($row);
              }

            return null;
    }

    public function selectByRole(string $role="CLIENT"):array{
            $sql="select * from user where role='$role'";
              $cursor=$this->pdo->query($sql);
              $users=[];
              while($row=$cursor->fetch()){
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