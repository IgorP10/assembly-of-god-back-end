<?php

declare(strict_types=1);

namespace App\Customer\Controller;

use App\Customer\Application\CustomerApplication;
use App\Customer\Application\Input\InputSaveCustomer;
use App\Customer\Domain\Service\CustomerService;
use App\Customer\Infrastructure\Entity\CustomerEntity;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomerController
{
    public function saveCustomerAction(Request $request, Response $response, array $args): Response
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $cpf = $body['cpf'] ?? null;
        $name = $body['name'] ?? null;
        $email = $body['email'] ?? null;
        $birthdate = $body['birthdate'] ?? null;
        $gender = $body['gender'] ?? null;

        $output = $this->getCustomerApplication()->saveCustomer(
            new InputSaveCustomer(
                $cpf,
                $name,
                $email,
                $birthdate,
                $gender
            )
        );

        return new JsonResponse($output, 200, [],JsonResponse::DEFAULT_JSON_FLAGS);
    }

    public function getCustomerApplication(): CustomerApplication
    {
        return new CustomerApplication(
            new CustomerService(
                new CustomerEntity()
            )
        );
    }
}
