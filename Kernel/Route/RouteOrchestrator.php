<?php

namespace Kernel\Route;

use App\Customer\Controller\CustomerController;
use Slim\App;

class RouteOrchestrator
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function setUpRoutes(): void
    {
         $this->app->get('/rota', [CustomerController::class, 'saveCustomerAction']);
    }
}