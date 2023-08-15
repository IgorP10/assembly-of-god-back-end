<?php

declare(strict_types=1);

namespace Kernel;

use Kernel\Configuration\Configuration;
use Kernel\DependencyInjection\DependecyInjectionManager;
use Kernel\DependencyInjection\ServiceContainer;
use Kernel\Error\Handler\ErrorHandler;
use Kernel\Route\RouteOrchestrator;

/**
 * Application Kernel bootstrap class
 */
class Kernel
{
    private static RouteOrchestrator $ROUTES;

    public function run(Configuration $configuration, $mountRoutes = true) : void
    {
        try {
            $this->setKernelConfiguration($configuration);
            $this->mountGlobals($configuration);
            $this->mountServiceContainers($configuration);

            if ($mountRoutes === true) {
                if (empty(self::$ROUTES)) {
                    self::$ROUTES = $this->mountRoutes();
                }

                self::$ROUTES->generate($configuration);
            }
        } catch (\Throwable $exception) {
            ErrorHandler::getInstance($configuration)
                ->notifyException($exception);

            throw $exception;
        }

    }

//    private function mountGlobals(Configuration $configuration) : void
//    {
//        include str_replace(['/Public', '\Public'], ['', ''], getcwd()) . '/Config/Global.php';
//    }
//
//    private function mountRoutes() : RouteOrchestrator
//    {
//        return new RouteOrchestrator();
//    }

    private function setKernelConfiguration(Configuration $configuration) : void
    {
        session_start();
        #Charset UTF-8 AND America/Sao_Paulo
        setlocale(LC_ALL, null);
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        setlocale(LC_MONETARY,"pt_BR", "ptb");
        date_default_timezone_set('America/Sao_Paulo');
        #Timeout
        set_time_limit(300);
        #Error handle
        error_reporting(E_ALL);
        $debug = '0';

        $modeDebug = (bool)$configuration->get('APP_DEBUG');

        if ($modeDebug === true) {
            $debug = '1';
        }

        ini_set('log_errors', $debug);
        ini_set('display_errors', $debug);
        ini_set('display_startup_erros', $debug);
    }

//    private function mountServiceContainers(Configuration $configuration) : void
//    {
//        $containers = (new DependecyInjectionManager())->generateContainer();
//        ServiceContainer::set($containers);
//        ServiceContainer::setConfiguration($configuration);
//    }
}
