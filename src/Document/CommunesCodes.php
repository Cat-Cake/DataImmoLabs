<?php

namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class CommunesCodes
{
    #[MongoDB\Id]
    private ?string $id = null;
    #[MongoDB\Field(type: 'string', nullable: true)]
    private ?string $code_commune = null;

    #[MongoDB\Field(type: 'string', nullable: true)]
    private ?string $nom_commune = null;

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

    public function getnom_commune(): ?string
    {
        return $this->nom_commune;
    }

    public function getNomCommune(): ?string
    {
        return $this->nom_commune;
    }

    public function setNomCommune(?string $nom_commune): self
    {
        $this->nom_commune = $nom_commune;
        return $this;
    }

}