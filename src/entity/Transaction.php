<?php 
namespace App\Entity;
class Transaction{
    private int $id;
    private \DateTime $date;
    private float $montant;
    private string  $type;
    private int  $compteId;
    public function __construct()
    {
       $this->date=new \DateTime();
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
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of montant
     */
    public function getMontant(): float
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     */
    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of compteId
     */
    public function getCompteId(): int
    {
        return $this->compteId;
    }

    /**
     * Set the value of compteId
     */
    public function setCompteId(int $compteId): self
    {
        $this->compteId = $compteId;

        return $this;
    }
}