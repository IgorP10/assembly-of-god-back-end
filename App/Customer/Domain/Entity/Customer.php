<?php

declare(strict_types=1);

namespace App\Customer\Domain\Entity;

class Customer implements \JsonSerializable
{
    private CustomerId $customerId;
    private string|null $cpf;
    private string|null $name;
    private string|null $birthdate;
    private string $email;
    private string $password;
    private string|null $gender;

    public function __construct(
        CustomerId $customerId,
        ?string $cpf,
        ?string $name,
        ?string $birthdate,
        string $email,
        string $password,
        ?string $gender
    ) {
        $this->customerId = $customerId;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->password = $password;
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

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
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
            'birthdate' => $this->getBirthdate(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'gender' => $this->getGender(),
        ];
    }
}
