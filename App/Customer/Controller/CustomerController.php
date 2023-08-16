<?php

declare(strict_types=1);

namespace App\Customer\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomerController
{
    public function saveCustomerAction(Request $request, Response $response): Response
    {
        $response->getBody()->write('Response from saveCustomerAction');
        return $response->withStatus(200);
    }
}