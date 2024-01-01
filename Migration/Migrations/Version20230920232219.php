<?php

declare(strict_types=1);

namespace Migration\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920232219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create new table customer';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('customer');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('cpf', 'string', ['length' => 11, 'notnull' => false]);
        $table->addUniqueIndex(['cpf'], 'customer_cpf_unique');
        $table->addColumn('name', 'string', ['length' => 255, 'notnull' => false]);
        $table->addColumn('birthdate', 'date', ['notnull' => false, 'default' => null]);
        $table->addColumn('email', 'string', ['length' => 255, 'notnull' => true]);
        $table->addUniqueIndex(['email'], 'customer_email_unique');
        $table->addColumn('password', 'string', ['length' => 255, 'notnull' => true]);
        $table->addColumn('status', 'boolean', ['notnull' => false, 'default' => 1]);
        $table->addColumn('created_at', 'datetime', ['notnull' => false, 'default' => 'CURRENT_TIMESTAMP']);
        $table->addColumn('updated_at', 'datetime', ['notnull' => false, 'default' => 'CURRENT_TIMESTAMP']);
        $table->addColumn('deleted_at', 'datetime', ['notnull' => false, 'default' => null]);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('customer');
    }
}
