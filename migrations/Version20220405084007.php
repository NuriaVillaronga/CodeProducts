<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405084007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contributor ADD website_role VARCHAR(100) DEFAULT NULL, ADD website_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD website_link VARCHAR(255) DEFAULT NULL, ADD website_role VARCHAR(100) DEFAULT NULL, ADD exclusive_rights LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contributor DROP website_role, DROP website_link');
        $this->addSql('ALTER TABLE product DROP website_link, DROP website_role, DROP exclusive_rights');
    }
}
