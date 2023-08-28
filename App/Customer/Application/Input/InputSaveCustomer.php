<?php

declare(strict_types=1);

namespace App\Customer\Application\Input;

class InputSaveCustomer
{
    private string|null $cpf;
    private string|null $name;
    private string|null $email;
    private string|null $birthdate;
    private string|null $gender;

    public function __construct(
        ?string $cpf,
        ?string $name,
        ?string $email,
        ?string $birthdate,
        ?string $gender
    ) {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
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


}
