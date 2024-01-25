<?php

declare(strict_types=1);

namespace App\Customer\Controller;

use App\Customer\Application\CustomerApplication;
use App\Customer\Application\Input\InputSaveCustomer;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomerController
{
    private CustomerApplication $customerApplication;

    public function __construct(CustomerApplication $customerApplication)
    {
        $this->customerApplication = $customerApplication;
    }

    public function saveCustomerAction(Request $request, Response $response, array $args): Response
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $customerId = $body['customerId'] ?? null;
        $cpf = $body['cpf'] ?? null;
        $name = $body['name'] ?? null;
        $email = $body['email'] ?? null;
        $birthdate = $body['birthdate'] ?? null;
        $gender = $body['gender'] ?? null;

        $output = $this->customerApplication->saveCustomer(
            new InputSaveCustomer(
                $customerId,
                $cpf,
                $name,
                $email,
                $birthdate,
                $gender
            )
        );

        return new JsonResponse($output->getOutput(), 200, [],JsonResponse::DEFAULT_JSON_FLAGS);
    }
}
