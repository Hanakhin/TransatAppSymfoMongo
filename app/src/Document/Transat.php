<?php

namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
#[MongoDB\Document(collection: "transats")]
class Transat
{
    #[MongoDB\Id]
    private string $id;

    #[MongoDB\Field(type:"string")]

    private int $numTransat;

    #[MongoDB\Field(type:"string")]
    private string $position;

    #[MongoDB\Field(type:"string")]
    private string $type;

    public function getId(): string
    {
        return $this->id;
    }

    public function getNumTransat(): int
    {
        return $this->numTransat;
    }

    public function setNumTransat(int $numTransat): transat
    {
        $this->numTransat = $numTransat;
        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): transat
    {
        $this->position = $position;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): transat
    {
        $this->type = $type;
        return $this;
    }




}