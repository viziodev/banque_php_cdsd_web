<?php 
class Compte{
    private static int $nbreCompte=10;
    private int $id;
    private string $numero;
    private DateTime $dateCreation;
    private float $solde;
    private string  $titulaire;


    /*
       self ==>Compte  ==> Static
         self::nomMethode():methode static
         self::$nomAttribut : attribut static dans la classe
        $this==> a un objet de la classe , instance
        $this
           -> interface d'un objet
           ->est obligatoire sur chaque membres d'intances
            $this->nomMethode():methode intance
            $this->$nomAttribut : attribut intance dans la classe
    */
    public function __construct()
    {
       $this->dateCreation=new DateTime();
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): void
    {
        $this->id = $id;

       
    }

    /**
     * Get the value of numero
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * Get the value of dateCreation
     */
    public function getDateCreation(): DateTime
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     */
    public function setDateCreation(DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * Get the value of solde
     */
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     */
    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }


    /**
     * Get the value of titulaire
     */
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    /**
     * Set the value of titulaire
     */
    public function setTitulaire(string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }
}