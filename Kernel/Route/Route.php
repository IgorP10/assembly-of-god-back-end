<?php

declare(strict_types=1);

namespace Kernel\Route;

interface Route
{
    public function register(): string;
}
