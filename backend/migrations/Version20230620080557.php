<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620080557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD edad INT NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP nombre');
        $this->addSql('ALTER TABLE "user" DROP apellido1');
        $this->addSql('ALTER TABLE "user" DROP apellido2');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" ADD apellido1 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD apellido2 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP edad');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN email TO nombre');
    }
}
