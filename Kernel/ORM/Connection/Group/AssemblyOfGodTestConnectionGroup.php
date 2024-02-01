<?php

declare(strict_types=1);

namespace Kernel\ORM\Connection\Group;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\PdoConfigurationConnection;
use Kernel\ORM\Connection\Connection;
use Kernel\ORM\Connection\ConnectionGroup;

class AssemblyOfGodTestConnectionGroup extends Connection implements ConnectionGroup
{
    public function getPdoConfigurationConnection(Configuration $configuration): PdoConfigurationConnection
    {
        $host       = $configuration->get('DB_TEST_HOST', 'mysql');
        $database   = $configuration->get('DB_TEST_DATABASE');
        $user       = $configuration->get('DB_TEST_USER');
        $password   = $configuration->get('DB_TEST_PASSWORD');
        $port       = $configuration->get('DB_TEST_PORT');

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
