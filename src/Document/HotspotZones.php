<?php

namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class HotspotZones
{
    #[MongoDB\Id]
    private ?string $id = null;
    #[MongoDB\Field(type: 'string', nullable: true)]
    private ?string $code_commune = null;

    #[MongoDB\Field(type: 'int', nullable: true)]
    private ?int $croissance = null;

    #[MongoDB\Field(type: 'hash')]
    private array $population = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getcode_commune(): ?string
    {
        return $this->code_commune;
    }

    public function getCodeCommune(): ?string
    {
        return $this->code_commune;
    }

    public function setCodeCommune(?string $code_commune): self
    {
        $this->code_commune = $code_commune;
        return $this;
    }


    public function getCroissance(): int
    {
        return $this->croissance;
    }

    public function setCroissance(int $croissance): self
    {
        $this->croissance = $croissance;
        return $this;
    }

    public function getPopulation(): array
    {
        return $this->population;
    }

    public function setPopulation(array $population): self
    {
        $this->population = $population;
        return $this;
    }

}