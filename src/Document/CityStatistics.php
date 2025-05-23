<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class CityStatistics
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type: 'int', nullable: true)]
    private ?string $prix_moyen_m2 = null;

    #[MongoDB\Field(type: 'int', nullable: true)]
    private ?string $transactions = null;

    #[MongoDB\Field(type: 'hash')]
    private array $ville = [];

    public function getprix_moyen_m2(): ?int
    {
        return $this->prix_moyen_m2;
    }

    public function setprix_moyen_m2(?int $prix_moyen_m2): self
    {
        $this->prix_moyen_m2 = $prix_moyen_m2;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTransactions(): ?int
    {
        return $this->transactions;
    }

    public function setTransactions(?int $value): self
    {
        $this->transactions = $value;
        return $this;
    }

    public function getVille(): array
    {
        return $this->ville;
    }

    public function setVille(array $ville): self
    {
        $this->ville = $ville;
        return $this;
    }

}