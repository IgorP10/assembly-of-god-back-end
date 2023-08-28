<?php

declare(strict_types=1);

namespace App\Customer\Domain\Service;

class CustomerService
{
    public function saveCustomer(
        ?string $cpf,
        ?string $name,
        ?string $email,
        ?string $birthdate,
        ?string $gender
    ) {
        echo'CustomerService::saveCustomer',
        die();
    }
}
