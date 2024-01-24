<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection\Container;

use Kernel\DependencyInjection\ContainerRegister;

class RegisterKernel implements ContainerRegister
{

    public function getPathContainer(): string
    {
        return __DIR__ . '/service.yml';
    }
}
