<?php

declare(strict_types=1);

namespace App\Customer\Route;

use Kernel\Route\Route;

class CustomerRoute implements Route
{
    public function getPathRoute(): string
    {
        return __DIR__ .'/CustomerRoute.yml';
    }
}
