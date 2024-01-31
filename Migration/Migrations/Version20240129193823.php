<?php

declare(strict_types=1);

namespace Migration\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240129193823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create tables users, roles, permissions and drop table customer';
    }

    public function up(Schema $schema): void
    {
        $schema->dropTable('customer');

        $table = $schema->createTable('users');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['notnull' => true, 'length' => 255]);
        $table->addColumn('birthdate', 'date', ['notnull' => false, 'default' => null]);
        $table->addColumn('email', 'string', ['notnull' => true, 'length' => 255]);
        $table->addUniqueIndex(['email'], 'customer_email_unique');
        $table->addColumn('password', 'string', ['notnull' => true, 'length' => 255]);
        $table->addColumn('registration', 'string', ['notnull' => false, 'length' => 20]);
        $table->addColumn('status', 'boolean', ['notnull' => false, 'default' => 1]);
        $table->addForeignKeyConstraint('roles', ['role_id'], ['id'], ['onDelete' => 'CASCADE']);
        $table->addColumn('created_at', 'datetime', ['notnull' => false, 'default' => 'CURRENT_TIMESTAMP']);
        $table->addColumn('updated_at', 'datetime', ['notnull' => false, 'default' => 'CURRENT_TIMESTAMP']);
        $table->addColumn('deleted_at', 'datetime', ['notnull' => false, 'default' => null]);

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('user');
    }
}
