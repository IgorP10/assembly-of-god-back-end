<?php

declare(strict_types=1);

namespace App\Customer\Application;

use App\Customer\Application\Input\InputSaveCustomer;
use App\Customer\Domain\Service\CustomerService;

class CustomerApplication
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function saveCustomer(InputSaveCustomer $inputSaveCustomer)
    {
        return $this->customerService->saveCustomer(
            $inputSaveCustomer->getCpf(),
            $inputSaveCustomer->getName(),
            $inputSaveCustomer->getEmail(),
            $inputSaveCustomer->getBirthdate(),
            $inputSaveCustomer->getGender()
        );
    }
}
