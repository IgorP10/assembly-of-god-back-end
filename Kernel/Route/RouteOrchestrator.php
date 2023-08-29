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
//        $routes = [
//            [
//                'name' => 'customer',
//                'method' => ['POST'],
//                'pattern' => '/customer',
//                'controller' => CustomerController::class,
//                'actionResult' => 'saveCustomerAction'
//            ]
//        ];
//
//        $this->createRoutesFromRouteRegistry($routes);

        $routes = RouteRegistry::getRoutes();

        /** @var Route $route */
        foreach ($routes as $route) {
            $routeInstance = new $route();
            $routeInstance->register($this->app);
        }

        $this->run($configuration);
    }

    private function createRoutesFromRouteRegistry(array $routes): void
    {
//        foreach ($routes as $route) {
//            foreach ($route['method'] as $method) {
//                $this->app->{$method}($route['pattern'], function (
//                    Request $request,
//                    Response $response,
//                    array $args
//                ) use ($route) : Response {
//                    $controller = new $route['controller']();
//                    $response = $controller->{$route['actionResult']}($request, $response, $args);
//                    return $response;
//                });
//            }
//        }
    }

    private function run(Configuration $configuration): void
    {
        //Add Routing Middleware
        $this->app->addRoutingMiddleware();

        //Add Error Handling Middleware
        $this->app->addErrorMiddleware(
            $configuration->get('APP_DEBUG') === 'true',
            $configuration->get('APP_LOG_ENABLED') === 'true',
            $configuration->get('APP_LOG_ENABLED') === 'true'
        );

        $this->app->run();
    }
}
