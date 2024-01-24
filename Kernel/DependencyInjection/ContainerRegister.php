<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection;

interface ContainerRegister
{
    public function getPathContainer(): string;
}
