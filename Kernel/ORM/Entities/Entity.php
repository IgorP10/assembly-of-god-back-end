<?php

namespace Kernel\ORM\Entities;

use Kernel\ORM\Connection\ConnectionGroup;

interface Entity
{
    public function getTableName() : string;

    public function getPrimaryKey() : string;

    public function getConnectionGroup() : ConnectionGroup;
}