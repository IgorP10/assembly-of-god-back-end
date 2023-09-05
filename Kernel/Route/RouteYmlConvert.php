<?php

declare(strict_types=1);

namespace Kernel\Route;

use Symfony\Component\Yaml\Yaml;

abstract class RouteYmlConvert
{
    public static function convertToRouteAttributesCollection(string $filename) : array
    {
        $items = [];

        $ymlParser = Yaml::parse(file_get_contents($filename));

        foreach ($ymlParser['routes'] as $route) {
            $items[] = [
                'name' => $route['name'] ?? '',
                'method' => $route['method'] ?? [],
                'pattern' => $route['pattern'] ?? '',
                'controller' => $route['controller'] ?? '',
                'actionResult' => $route['actionResult'] ?? ''
            ];
        }

        return $items;
    }
}
