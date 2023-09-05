<?php

declare(strict_types=1);

namespace App\Customer\Application;

use App\Customer\Application\Input\InputSaveCustomer;
use App\Customer\Application\Output\OutputSaveCustomer;
use App\Customer\Domain\Service\CustomerService;

class CustomerApplication
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function saveCustomer(InputSaveCustomer $inputSaveCustomer): OutputSaveCustomer
    {
        return new OutputSaveCustomer(
            $this->customerService->saveCustomer(
                $inputSaveCustomer->getCustomer()
            )
        );
    }
}
