<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class CityTransactions
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type: 'int', nullable: true)]
    private ?string $value = null;

    public function getId()
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;
        return $this;
    }

}