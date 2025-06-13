<?php 
namespace App\Config;
abstract class Repository{
    private  Database $database;
    protected \PDO $pdo;
  
    public function __construct()
    {
        $this->database=new Database();
        $this->pdo= $this->database->getPdo();
    }

    protected abstract function convert($row):object;
}