<?php

declare(strict_types=1);

namespace App\Customer\Domain\Service;

use App\Customer\Domain\Entity\CustomerEntityInterface;
use Kernel\ORM\Connection\ConnectionGroup;
use Kernel\ORM\Entities\Entity;

class CustomerService
{
    private CustomerEntityInterface $customerEntity;
    public function __construct(CustomerEntityInterface $customerEntity)
    {
        $this->customerEntity = $customerEntity;
    }

    public function saveCustomer(
        ?string $cpf,
        ?string $name,
        ?string $email,
        ?string $birthdate,
        ?string $gender
    ) {
        return $this->customerEntity->save(
            $cpf,
            $name,
            $email,
            $birthdate,
            $gender
        );

    }
}
