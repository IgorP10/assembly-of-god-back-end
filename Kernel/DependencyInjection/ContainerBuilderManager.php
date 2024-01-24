<?php

declare(strict_types=1);

namespace Kernel\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContainerBuilderManager
{
    public function loadContainerConfiguration(): ContainerBuilder
    {
        $containerBuilder = new ContainerBuilder();

        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));

        foreach ($this->getContainers() as $container) {
            $loader->load($container);
        }

        return $containerBuilder;
    }

    private function getContainers(): array
    {
        $containers = [];

        foreach (ContainerRegisters::getContainers() as $container) {
            /** @var  ContainerRegister $containerRegister */
            $containerRegister = new $container();
            $containers[] = $containerRegister->getPathContainer();
        }

        return $containers;
    }
}
