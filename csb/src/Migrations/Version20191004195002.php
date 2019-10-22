<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191004195002 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE evenements ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE partenaires ADD logo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE programmes ADD file VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles DROP image');
        $this->addSql('ALTER TABLE evenements DROP image');
        $this->addSql('ALTER TABLE partenaires DROP logo');
        $this->addSql('ALTER TABLE programmes DROP file');
    }
}
