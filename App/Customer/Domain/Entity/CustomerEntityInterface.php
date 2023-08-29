<?php

namespace App\Customer\Domain\Entity;

interface CustomerEntityInterface
{
    public function save(
        ?string $cpf,
        ?string $name,
        ?string $email,
        ?string $birthdate,
        ?string $gender
    );
}