<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316211917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('books');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('title', 'string', ['length' => 255]);
        $table->addColumn('publisher', 'string', ['length' => 255]);
        $table->addColumn('author', 'string', ['length' => 255]);
        $table->addColumn('genre', 'string', ['length' => 255]);
        $table->addColumn('publication_date', 'date');
        $table->addColumn('word_count', 'integer');
        $table->addColumn('price', 'float');
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('books');
    }
}
