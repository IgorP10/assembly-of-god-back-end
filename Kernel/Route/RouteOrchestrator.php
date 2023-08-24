<?php

namespace Kernel\Route;

use App\Customer\Controller\CustomerController;
use Kernel\Configuration\Configuration;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

class RouteOrchestrator
{
    private App $app;

    public function __construct()
    {
        AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
        ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);

        $this->app = AppFactory::create();
    }

    public function setUpRoutes(Configuration $configuration): void
    {
        $routes = [
            [
                'name' => 'customer',
                'method' => ['GET'],
                'pattern' => '/customer',
                'controller' => CustomerController::class,
                'actionResult' => 'saveCustomerAction'
            ]
        ];

        $this->createRoutesFromRouteRegistry($routes);

        $this->run($configuration);
    }

    private function createRoutesFromRouteRegistry(array $routes): void
    {
        foreach ($routes as $route) {
            foreach ($route['method'] as $method) {
                $this->app->{$method}($route['pattern'], function (
                    Request $request,
                    Response $response,
                ) use ($route) : Response {
                    $controller = new $route['controller']();
                    $response = $controller->{$route['actionResult']}($request, $response);
                    return $response;
                });
            }
        }
    }

    private function run(Configuration $configuration): void
    {
        //Add Routing Middleware
        $this->app->addRoutingMiddleware();

        $this->app->run();
    }
}