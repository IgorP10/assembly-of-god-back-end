<?php

declare(strict_types=1);

namespace Kernel\ORM\Entities;

use Doctrine\DBAL\Exception;

abstract class EntityOrchestrator
{
    protected static \Doctrine\DBAL\Connection|null $CONNECTION_DBAL = null;

    private string $tableName;

    private string $primaryKey;

    private array $fieldsCollection = [];

    public function getConnection(): \Doctrine\DBAL\Connection
    {
        if (self::$CONNECTION_DBAL === null) {
            self::$CONNECTION_DBAL = $this->getConnectionGroup()->getConnection();
        }

        return self::$CONNECTION_DBAL;
    }

    public function setFieldCollection(string $field, mixed $value): void
    {
        $this->fieldsCollection[$field] = $value;
    }

    /**
     * @throws Exception
     */
    public function insert(): int
    {
        $connection = $this->getConnection();

        $connection->insert($this->getTableName(), $this->fieldsCollection);

        $this->resetFieldCollection();

        return (int)$connection->lastInsertId();
    }

    public function resetFieldCollection(): void
    {
        $this->fieldsCollection = [];
    }
}
