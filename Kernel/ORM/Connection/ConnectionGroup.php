<?php

declare(strict_types=1);

namespace Kernel\ORM\Connection;

use Kernel\Configuration\Configuration;
use Kernel\Configuration\PdoConfigurationConnection;

interface ConnectionGroup
{
    public function getPdoConfigurationConnection(Configuration $configuration): PdoConfigurationConnection;
    public function getConnection() : \Doctrine\DBAL\Connection;
    public function getName() : string;
}