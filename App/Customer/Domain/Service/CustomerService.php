<?php

declare(strict_types=1);

namespace App\Customer\Domain\Service;

use App\Customer\Domain\Entity\Customer;
use App\Customer\Domain\Entity\CustomerEntityInterface;

class CustomerService
{
    private CustomerEntityInterface $customerEntity;
    public function __construct(CustomerEntityInterface $customerEntity)
    {
        $this->customerEntity = $customerEntity;
    }

    public function saveCustomer(Customer $customer): Customer
    {
        return $this->customerEntity->save($customer);
    }
}
