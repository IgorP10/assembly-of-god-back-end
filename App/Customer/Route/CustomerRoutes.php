<?php

declare(strict_types=1);

namespace App\Customer\Route;

use App\Customer\Controller\CustomerController;
use Kernel\Route\Route;
use Slim\App;

class CustomerRoutes implements Route
{
    public function register(App $app): void
    {
        $app->group('/customer', function (App $app) {
            $app->post('/teste', [CustomerController::class, 'saveCustomerAction']);
        });
    }
}
