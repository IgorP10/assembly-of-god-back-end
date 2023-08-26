<?php

use App\Customer\Controller\CustomerController;
use Slim\App;

return function (App $app) {
    $app->post('/customers', [CustomerController::class, 'saveCustomerAction']);
    // Defina outras rotas conforme necessário
};
