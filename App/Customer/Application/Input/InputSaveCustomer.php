<?php

declare(strict_types=1);

namespace App\Customer\Application\Input;

use App\Customer\Domain\Entity\Customer;
use App\Customer\Domain\Entity\CustomerId;

class InputSaveCustomer
{
    private int|null $customerId;
    private string|null $cpf;
    private string|null $name;
    private string|null $birthdate;
    private string|null $email;
    private string|null $password;
    private string|null $gender;

    public function __construct(
        ?int $customerId,
        ?string $cpf,
        ?string $name,
        ?string $birthdate,
        ?string $email,
        ?string $password,
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

    public function getCustomer(): Customer
    {
        return new Customer(
            $this->getCustomerId(),
            $this->cpf,
            $this->name,
            $this->birthdate,
            $this->email,
            $this->password,
            $this->gender
        );
    }

    public function getCustomerId(): CustomerId
    {
        return new CustomerId($this->customerId);
    }
}
