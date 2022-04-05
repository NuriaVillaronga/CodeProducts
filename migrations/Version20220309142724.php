<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309142724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD bisacregion VARCHAR(100) DEFAULT NULL, ADD bicsubject VARCHAR(100) DEFAULT NULL, ADD bicversion VARCHAR(100) DEFAULT NULL, DROP bisac_subject, DROP thema_subject, DROP themes_electre, DROP subject_schema_version, DROP subject_code');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD bisac_subject VARCHAR(100) DEFAULT NULL, ADD thema_subject VARCHAR(100) DEFAULT NULL, ADD themes_electre VARCHAR(100) DEFAULT NULL, ADD subject_schema_version VARCHAR(100) DEFAULT NULL, ADD subject_code VARCHAR(100) DEFAULT NULL, DROP bisacregion, DROP bicsubject, DROP bicversion');
    }
}
