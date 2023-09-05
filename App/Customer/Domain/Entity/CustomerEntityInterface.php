<?php

declare(strict_types=1);

namespace App\Customer\Domain\Entity;

interface CustomerEntityInterface
{
    public function save(Customer $customer): Customer;
}
