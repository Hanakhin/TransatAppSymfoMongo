<?php

namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
#[MongoDB\Document(collection: "reservations")]
class Reservation
{
    #[MongoDB\Id]
    private string $id;

    #[MongoDB\Field(type:"date")]
    private \DateTime $date;

    #[MongoDB\Field(type:"string")]
    private string $emplacement;

    #[MongoDB\Field(type:"string")]
    private string $horaires;

    #[MongoDB\Field(type:"float")]
    private float $prix;

    #[MongoDB\Field(type:"string")]
    private string $heureDebut;

    #[MongoDB\Field(type:"integer")]
    private int $nbTransat;
    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): Reservation
    {
        $this->date = $date;
        return $this;
    }

    public function getEmplacement(): string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): Reservation
    {
        $this->emplacement = $emplacement;
        return $this;
    }

    public function getHoraires(): string
    {
        return $this->horaires;
    }

    public function setHoraires(string $horaires): Reservation
    {
        $this->horaires = $horaires;
        return $this;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): Reservation
    {
        $this->prix = $prix;
        return $this;
    }

    public function getHeureDebut(): string
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(string $heureDebut): Reservation
    {
        $this->heureDebut = $heureDebut;
        return $this;
    }

    public function getNbTransat(): int
    {
        return $this->nbTransat;
    }

    public function setNbTransat(int $nbTransat): Reservation
    {
        $this->nbTransat = $nbTransat;
        return $this;
    }



}