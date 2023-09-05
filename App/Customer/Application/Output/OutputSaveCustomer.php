<?php

declare(strict_types=1);

namespace App\Customer\Application\Output;

use App\Customer\Domain\Entity\Customer;

class OutputSaveCustomer
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getOutput(): array
    {
        return [
            'customer' => $this->customer->jsonSerialize(),
        ];
    }
}
