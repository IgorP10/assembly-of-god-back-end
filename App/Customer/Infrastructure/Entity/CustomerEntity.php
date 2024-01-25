<?php

declare(strict_types=1);

namespace App\Customer\Infrastructure\Entity;

use App\Customer\Domain\Entity\Customer;
use App\Customer\Domain\Entity\CustomerEntityInterface;
use App\Customer\Domain\Entity\CustomerId;
use Kernel\ORM\Connection\ConnectionGroup;
use Kernel\ORM\Connection\Group\AssemblyOfGodWriteConnectionGroup;
use Kernel\ORM\Entities\Entity;
use Kernel\ORM\Entities\EntityOrchestrator;

class CustomerEntity extends EntityOrchestrator implements Entity, CustomerEntityInterface
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
        return new AssemblyOfGodWriteConnectionGroup();
    }

    public function save(Customer $customer): Customer
    {
        $entity = new self();

        $birthdate = new \DateTime($customer->getBirthdate());

        $entity->setFieldCollection('cpf', $customer->getCpf());
        $entity->setFieldCollection('name', $customer->getName());
        $entity->setFieldCollection('email', $customer->getEmail());
        $entity->setFieldCollection('birthdate', $birthdate->format("Y-m-d"));
        $entity->setFieldCollection('gender',  strtoupper($customer->getGender()));
        $entity->setFieldCollection('status', 1);
        $entity->setFieldCollection('created_at', (new \DateTime())->format("Y-m-d H:i:s"));
        $entity->setFieldCollection('updated_at', (new \DateTime())->format("Y-m-d H:i:s"));

        $id = $entity->insert();

        return new Customer(
            new CustomerId($id),
            $customer->getCpf(),
            $customer->getName(),
            $customer->getEmail(),
            $customer->getBirthdate(),
            $customer->getGender()
        );
    }
}
