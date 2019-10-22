<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191004202000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE evenements ADD sous_themes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD4008FFD429D FOREIGN KEY (sous_themes_id) REFERENCES sous_theme (id)');
        $this->addSql('CREATE INDEX IDX_E10AD4008FFD429D ON evenements (sous_themes_id)');
        $this->addSql('ALTER TABLE images ADD evenements_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A63C02CD4 FOREIGN KEY (evenements_id) REFERENCES evenements (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A63C02CD4 ON images (evenements_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD4008FFD429D');
        $this->addSql('DROP INDEX IDX_E10AD4008FFD429D ON evenements');
        $this->addSql('ALTER TABLE evenements DROP sous_themes_id');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A63C02CD4');
        $this->addSql('DROP INDEX IDX_E01FBE6A63C02CD4 ON images');
        $this->addSql('ALTER TABLE images DROP evenements_id');
    }
}
