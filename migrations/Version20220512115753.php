<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512115753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__climate_change AS SELECT id, field, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen FROM climate_change');
        $this->addSql('DROP TABLE climate_change');
        $this->addSql('CREATE TABLE climate_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, field VARCHAR(255) NOT NULL, eight VARCHAR(255) NOT NULL, nine VARCHAR(255) NOT NULL, ten VARCHAR(255) NOT NULL, eleven VARCHAR(255) NOT NULL, twelve VARCHAR(255) NOT NULL, thirteen VARCHAR(255) NOT NULL, fourteen VARCHAR(255) NOT NULL, fifteen VARCHAR(255) NOT NULL, sixteen VARCHAR(255) NOT NULL, seventeen VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO climate_change (id, field, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen) SELECT id, field, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen FROM __temp__climate_change');
        $this->addSql('DROP TABLE __temp__climate_change');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__climate_change AS SELECT id, field, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen FROM climate_change');
        $this->addSql('DROP TABLE climate_change');
        $this->addSql('CREATE TABLE climate_change (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, field VARCHAR(255) NOT NULL, eight INTEGER NOT NULL, nine INTEGER NOT NULL, ten INTEGER NOT NULL, eleven INTEGER NOT NULL, twelve INTEGER NOT NULL, thirteen INTEGER NOT NULL, fourteen INTEGER NOT NULL, fifteen INTEGER NOT NULL, sixteen INTEGER NOT NULL, seventeen INTEGER NOT NULL)');
        $this->addSql('INSERT INTO climate_change (id, field, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen) SELECT id, field, eight, nine, ten, eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen FROM __temp__climate_change');
        $this->addSql('DROP TABLE __temp__climate_change');
    }
}
