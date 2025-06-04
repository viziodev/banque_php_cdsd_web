<?php 
class Database{
    private string $server = 'localhost:8889';
    private string $dbname = 'banque_glrs_cdsa_mae_2025';
    private string $username = 'root';
    private string $password = 'root';
    private string $charset = 'utf8mb4';

    private PDO|null $pdo=null;//Connexion a la BD est Ferme

    public function __construct()
    {
        $chaineConnexion = "mysql:host=$this->server;dbname=$this->dbname;charset=$this->charset";
        if ($this->pdo==null) {
            $this->pdo = new PDO(  $chaineConnexion,  $this->username,   $this->password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             ]);
         }
         
    }

    /**
     * Get the value of pdo
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function closeConnection(): void
    {
       $this->pdo=null;
    }
}