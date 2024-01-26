<?php

declare(strict_types=1);

namespace Kernel\Http\Controller;

use Kernel\DependencyInjection\ContainerService;
use Psr\Container\ContainerInterface;

abstract class AbstractController
{
    protected function getContainer(): ContainerInterface
    {
        return ContainerService::getContainer();
    }
}
