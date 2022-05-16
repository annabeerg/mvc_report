<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512114121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE climate_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, field VARCHAR(255) NOT NULL, eight INTEGER NOT NULL, nine INTEGER NOT NULL, ten INTEGER NOT NULL, eleven INTEGER NOT NULL, twelve INTEGER NOT NULL, thirteen INTEGER NOT NULL, fourteen INTEGER NOT NULL, fifteen INTEGER NOT NULL, sixteen INTEGER NOT NULL, seventeen INTEGER NOT NULL)');
        $this->addSql('DROP TABLE product');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL COLLATE BINARY, value INTEGER DEFAULT NULL)');
        $this->addSql('DROP TABLE climate_change');
    }
}
