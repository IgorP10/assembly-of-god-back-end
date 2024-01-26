<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerService
{
    private static ContainerInterface $containers;

    public static function setContainer(ContainerInterface $container) : void
    {
        self::$containers = $container;
    }

    public static function getContainer(): ContainerInterface
    {
        return self::$containers;
    }
}
