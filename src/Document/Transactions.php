<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Transactions
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(name: 'id_mutation', type: 'string')]
    private ?string $idMutation = null;

    #[MongoDB\Field(name: 'date_mutation', type: 'date')]
    private ?\DateTime $dateMutation = null;

    #[MongoDB\Field(type: 'string', nullable: true)]
    private ?string $natureMutation = null;

    #[MongoDB\Field(type: 'float', nullable: true)]
    private ?float $valeurFoncier = null;

    #[MongoDB\Field(type: 'float', nullable: true)]
    private ?float $surfaceReelleBati = null;

    #[MongoDB\Field(type: 'int', nullable: true)]
    private ?int $nombrePieces = null;

    #[MongoDB\Field(type: 'int', nullable: true)]
    private ?int $nombreLots = null;

    #[MongoDB\Field(type: 'float', nullable: true)]
    private ?float $surfaceTerrain = null;

    #[MongoDB\Field(type: 'string', nullable: true)]
    private ?string $typeLocal = null;

    #[MongoDB\Field(type: 'hash')]
    private array $adresse = [];

    #[MongoDB\Field(type: 'hash')]
    private array $coordonee = [];

    #[MongoDB\Field(type: 'collection')]
    private array $lots = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getIdMutation(): ?string
    {
        return $this->idMutation;
    }

    public function setIdMutation(?string $idMutation): self
    {
        $this->idMutation = $idMutation;
        return $this;
    }

    public function getDateMutation(): ?\DateTime
    {
        return $this->dateMutation;
    }

    public function setDateMutation(?\DateTime $dateMutation): self
    {
        $this->dateMutation = $dateMutation;
        return $this;
    }

    public function getNatureMutation(): ?string
    {
        return $this->natureMutation;
    }

    public function setNatureMutation(?string $natureMutation): self
    {
        $this->natureMutation = $natureMutation;
        return $this;
    }

    public function getValeurFoncier(): ?float
    {
        return $this->valeurFoncier;
    }

    public function setValeurFoncier(?float $valeurFoncier): self
    {
        $this->valeurFoncier = $valeurFoncier;
        return $this;
    }

    public function getSurfaceReelleBati(): ?float
    {
        return $this->surfaceReelleBati;
    }

    public function setSurfaceReelleBati(?float $surfaceReelleBati): self
    {
        $this->surfaceReelleBati = $surfaceReelleBati;
        return $this;
    }

    public function getNombrePieces(): ?int
    {
        return $this->nombrePieces;
    }

    public function setNombrePieces(?int $nombrePieces): self
    {
        $this->nombrePieces = $nombrePieces;
        return $this;
    }

    public function getNombreLots(): ?int
    {
        return $this->nombreLots;
    }

    public function setNombreLots(?int $nombreLots): self
    {
        $this->nombreLots = $nombreLots;
        return $this;
    }

    public function getSurfaceTerrain(): ?float
    {
        return $this->surfaceTerrain;
    }

    public function setSurfaceTerrain(?float $surfaceTerrain): self
    {
        $this->surfaceTerrain = $surfaceTerrain;
        return $this;
    }

    public function getTypeLocal(): ?string
    {
        return $this->typeLocal;
    }

    public function setTypeLocal(?string $typeLocal): self
    {
        $this->typeLocal = $typeLocal;
        return $this;
    }

    public function getAdresse(): array
    {
        return $this->adresse;
    }

    public function setAdresse(array $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getCoordonee(): array
    {
        return $this->coordonee;
    }

    public function setCoordonee(array $coordonee): self
    {
        $this->coordonee = $coordonee;
        return $this;
    }

    public function getLots(): array
    {
        return $this->lots;
    }

    public function setLots(array $lots): self
    {
        $this->lots = $lots;
        return $this;
    }
}