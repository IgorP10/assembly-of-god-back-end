<?php

namespace App\Customer\Infrastructure\Entity;

use App\Customer\Domain\Entity\CustomerEntityInterface;
use Kernel\ORM\Connection\ConnectionGroup;
use Kernel\ORM\Connection\Group\DeliveryWriteConnectionGroup;
use Kernel\ORM\Entities\Entity;

class CustomerEntity implements Entity, CustomerEntityInterface
{
    public function getTableName(): string
    {
        return 'customer';
    }

    public function getPrimaryKey(): string
    {
        return 'id';
    }

    public function getConnectionGroup(): ConnectionGroup
    {
        return new DeliveryWriteConnectionGroup();
    }

    public function save(
        ?string $cpf,
        ?string $name,
        ?string $email,
        ?string $birthdate,
        ?string $gender
    ): int|string {
        $birthdate = new \DateTime($birthdate);

        $fieldsCollection = [
            'cpf' => $cpf,
            'name' => $name,
            'email' => $email,
            'birthdate' => $birthdate->format("Y-m-d"),
            'gender' => strtoupper($gender),
            'status' => 1,
            'created_at' => (new \DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new \DateTime())->format("Y-m-d H:i:s"),
        ];

        $this->getConnectionGroup()->getConnection()->insert($this->getTableName(), $fieldsCollection);

        return $this->getConnectionGroup()->getConnection()->lastInsertId();
    }
}