<?php 
namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService{
    private UserRepository $userRepository;
    public function __construct()
    {
        $this->userRepository =new UserRepository(); 
    }

    public function seConnecter(string $login,string $password):null|User{
      return $this->userRepository->selectByLoginAndPassword($login,$password);
    }

    public function getClients():array{
      return $this->userRepository->selectByRole();
    }
}