<?php

declare(strict_types=1);

namespace Kernel\Route;

use App\Customer\Route\CustomerRoutes;

class RouteRegistry
{
    public static function getRoutes(): array
    {
        return [
            CustomerRoutes::class
        ];
    }
}
