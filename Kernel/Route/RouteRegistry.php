<?php

declare(strict_types=1);

namespace Kernel\Route;

use App\Customer\Route\CustomerRoute;

class RouteRegistry
{
    public static function getRoutes(): array
    {
        return [
            CustomerRoute::class
        ];
    }
}
