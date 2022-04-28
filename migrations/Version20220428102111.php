<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428102111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__library AS SELECT id, namn, titel, isbn, bild FROM library');
        $this->addSql('DROP TABLE library');
        $this->addSql('CREATE TABLE library (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, namn VARCHAR(100) DEFAULT NULL, titel VARCHAR(100) DEFAULT NULL, isbn VARCHAR(100) DEFAULT NULL, bild VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO library (id, namn, titel, isbn, bild) SELECT id, namn, titel, isbn, bild FROM __temp__library');
        $this->addSql('DROP TABLE __temp__library');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__library AS SELECT id, namn, titel, isbn, bild FROM library');
        $this->addSql('DROP TABLE library');
        $this->addSql('CREATE TABLE library (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, namn VARCHAR(100) DEFAULT NULL, titel VARCHAR(100) DEFAULT NULL, isbn VARCHAR(100) NOT NULL, bild VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO library (id, namn, titel, isbn, bild) SELECT id, namn, titel, isbn, bild FROM __temp__library');
        $this->addSql('DROP TABLE __temp__library');
    }
}
