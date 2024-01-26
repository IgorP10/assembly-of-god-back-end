<?php

declare(strict_types=1);

namespace App\Customer\Controller;

use App\Customer\Application\CustomerApplication;
use App\Customer\Application\Input\InputSaveCustomer;
use Kernel\Http\Controller\AbstractController;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomerController extends AbstractController
{
    public function saveCustomerAction(Request $request, Response $response, array $args): Response
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $customerId = $body['customerId'] ?? null;
        $cpf = $body['cpf'] ?? null;
        $name = $body['name'] ?? null;
        $birthdate = $body['birthdate'] ?? null;
        $email = $body['email'] ?? null;
        $password = $body['password'] ?? null;
        $gender = $body['gender'] ?? null;

        $output = $this->getCustomerApplication()->saveCustomer(
            new InputSaveCustomer(
                $customerId,
                $cpf,
                $name,
                $birthdate,
                $email,
                $password,
                $gender
            )
        );

        return new JsonResponse($output->getOutput(), 200, [],JsonResponse::DEFAULT_JSON_FLAGS);
    }

    public function getCustomerApplication(): CustomerApplication
    {
        return $this->getContainer()->get('context.customer.application.customerApplication');
    }
}
