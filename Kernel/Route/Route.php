<?php

declare(strict_types=1);

namespace Kernel\Route;

use Slim\App;

interface Route
{
    public function register(App $app): void;
}
