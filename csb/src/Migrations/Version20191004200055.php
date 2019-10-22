<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191004200055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sous_theme ADD themes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sous_theme ADD CONSTRAINT FK_E891E7ED94F4A9D2 FOREIGN KEY (themes_id) REFERENCES themes (id)');
        $this->addSql('CREATE INDEX IDX_E891E7ED94F4A9D2 ON sous_theme (themes_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sous_theme DROP FOREIGN KEY FK_E891E7ED94F4A9D2');
        $this->addSql('DROP INDEX IDX_E891E7ED94F4A9D2 ON sous_theme');
        $this->addSql('ALTER TABLE sous_theme DROP themes_id');
    }
}
