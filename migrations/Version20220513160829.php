<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513160829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bnp (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, field VARCHAR(255) NOT NULL, eight VARCHAR(255) NOT NULL, nine VARCHAR(255) NOT NULL, ten VARCHAR(255) NOT NULL, eleven VARCHAR(255) NOT NULL, twelve VARCHAR(255) NOT NULL, thirteen VARCHAR(255) NOT NULL, fourteen VARCHAR(255) NOT NULL, fifteen VARCHAR(255) NOT NULL, sixteen VARCHAR(255) NOT NULL, seventeen VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bnp');
    }
}
