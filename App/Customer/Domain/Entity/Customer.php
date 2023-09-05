<?php

declare(strict_types=1);

namespace App\Customer\Domain\Entity;

class Customer implements \JsonSerializable
{
    private CustomerId $customerId;
    private string|null $cpf;
    private string|null $name;
    private string|null $email;
    private string|null $birthdate;
    private string|null $gender;

    public function __construct(
        CustomerId $customerId,
        ?string $cpf,
        ?string $name,
        ?string $email,
        ?string $birthdate,
        ?string $gender
    ) {
        $this->customerId = $customerId;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    public function getCustomerId(): CustomerId
    {
        return $this->customerId;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getCustomerId()->getId(),
            'cpf' => $this->getCpf(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'birthdate' => $this->getBirthdate(),
            'gender' => $this->getGender(),
        ];
    }
}
