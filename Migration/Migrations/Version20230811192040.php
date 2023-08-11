<?php

declare(strict_types=1);

namespace Migration\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230811192040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create new table users';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('customer');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('cpf', 'string', ['length' => 16, 'notnull' => false]);
        $table->addColumn('name', 'string', ['length' => 255, 'notnull' => false]);
        $table->addColumn('email', 'string', ['length' => 255, 'notnull' => false]);
        $table->addColumn('birthdate', 'date', ['notnull' => false, 'default' => null]);
        $table->addColumn('gender', 'string', ['length' => 1, 'notnull' => false, 'default' => 'M']);
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
