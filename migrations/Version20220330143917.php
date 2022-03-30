<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330143917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP on_sale_date, DROP expected_ship_date, DROP on_sale_date_format, DROP expected_ship_date_format');
        $this->addSql('ALTER TABLE supplier ADD on_sale_date DATE DEFAULT NULL, ADD expected_ship_date DATE DEFAULT NULL, ADD on_sale_date_format VARCHAR(100) DEFAULT NULL, ADD expected_ship_date_format VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD on_sale_date DATE DEFAULT NULL, ADD expected_ship_date DATE DEFAULT NULL, ADD on_sale_date_format VARCHAR(100) DEFAULT NULL, ADD expected_ship_date_format VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE supplier DROP on_sale_date, DROP expected_ship_date, DROP on_sale_date_format, DROP expected_ship_date_format');
    }
}
