<?php

declare(strict_types=1);

namespace Kernel\Route;

use Kernel\Configuration\Configuration;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

class RouteOrchestrator
{
    private App $app;

    /** @var Route[] */
    private array $routes;

    public function __construct()
    {
        AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
        ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);

        $this->app = AppFactory::create();
        $this->routes = (new RouteRegistry())->getRoutes();
    }

    public function setUpRoutes(Configuration $configuration): void
    {
        $routes = [];

        /** @var Route $route */
        foreach ($this->routes as $route) {
            $routeInstance = new $route();
            $routes = array_merge($routes, RouteYmlConvert::convertToRouteAttributesCollection($routeInstance->register()));
        }

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
                    array $args
                ) use ($route) : Response {
                    $controller = new $route['controller']();
                    return $controller->{$route['actionResult']}($request, $response, $args);
                });
            }
        }
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
