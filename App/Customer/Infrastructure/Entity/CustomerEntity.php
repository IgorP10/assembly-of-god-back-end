<?php

declare(strict_types=1);

namespace App\Customer\Infrastructure\Entity;

use App\Customer\Domain\Entity\Customer;
use App\Customer\Domain\Entity\CustomerEntityInterface;
use App\Customer\Domain\Entity\CustomerId;
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

    public function save(Customer $customer): Customer
    {
        $birthdate = new \DateTime($customer->getBirthdate());

        $fieldsCollection = [
            'cpf' => $customer->getCpf(),
            'name' => $customer->getName(),
            'email' => $customer->getEmail(),
            'birthdate' => $birthdate->format("Y-m-d"),
            'gender' => strtoupper($customer->getGender()),
            'status' => 1,
            'created_at' => (new \DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new \DateTime())->format("Y-m-d H:i:s"),
        ];

        $this->getConnectionGroup()->getConnection()->insert($this->getTableName(), $fieldsCollection);

        $id = $this->getConnectionGroup()->getConnection()->lastInsertId();

        return new Customer(
            new CustomerId((int)$id),
            $customer->getCpf(),
            $customer->getName(),
            $customer->getEmail(),
            $customer->getBirthdate(),
            $customer->getGender()
        );
    }
}
