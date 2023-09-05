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
    private string|null $email;
    private string|null $birthdate;
    private string|null $gender;

    public function __construct(
        ?int $customerId,
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

    public function getCustomer(): Customer
    {
        return new Customer(
            $this->getCustomerId(),
            $this->cpf,
            $this->name,
            $this->email,
            $this->birthdate,
            $this->gender
        );
    }

    public function getCustomerId(): CustomerId
    {
        return new CustomerId($this->customerId);
    }
}
