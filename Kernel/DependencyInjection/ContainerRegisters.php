<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection;

use Kernel\DependencyInjection\Container\RegisterKernel;

abstract class ContainerRegisters
{
    public static function getContainers(): array
    {
        return [
            RegisterKernel::class,
            \App\Customer\Container\Register::class,
        ];
    }
}
