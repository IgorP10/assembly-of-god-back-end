<?php

declare(strict_types=1);

namespace Kernel\ORM\Entities;

abstract class Identifier implements \JsonSerializable
{
    private int|null $id;

    public function __construct(?int $id)
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId()
        ];
    }
}
