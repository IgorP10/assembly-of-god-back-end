<?php

declare(strict_types=1);

namespace App\Customer\Container;

use Kernel\DependencyInjection\ContainerRegister;

class Register implements ContainerRegister
{
    public function getPathContainer(): string
    {
        return __DIR__ . '/service.yml';
    }
}
