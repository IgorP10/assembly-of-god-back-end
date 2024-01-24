<?php

declare(strict_types=1);

namespace Kernel\ORM\Connection\Group;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\PdoConfigurationConnection;
use Kernel\ORM\Connection\Connection;
use Kernel\ORM\Connection\ConnectionGroup;

class ChurchReadConnectionGroup extends Connection implements ConnectionGroup
{
    public function getPdoConfigurationConnection(Configuration $configuration): PdoConfigurationConnection
    {
        $host       = $configuration->get('DB_READ_HOST', 'mysql');
        $database   = $configuration->get('DB_READ_DATABASE');
        $user       = $configuration->get('DB_READ_USER');
        $password   = $configuration->get('DB_READ_PASSWORD');
        $port       = $configuration->get('DB_READ_PORT');

        return new PdoConfigurationConnection(
            $host,
            $port,
            $user,
            $password,
            $database
        );
    }

//    public function getTimezone(): string
//    {
//        return '-03:00';
//    }
}
