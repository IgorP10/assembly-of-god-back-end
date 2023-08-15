<?php

namespace Kernel\Route;

use Slim\App;

class RouteOrchestrator
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function setUpRoutes()
    {

    }
}