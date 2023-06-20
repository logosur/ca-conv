<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620080220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE ciudad_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE ciudad (id INT NOT NULL, ciudad VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP INDEX uniq_8d93d649e7927c74');
        $this->addSql('ALTER TABLE "user" ADD ciudad_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD nombre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD apellido1 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD apellido2 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN email TO username');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649E8608214 FOREIGN KEY (ciudad_id) REFERENCES ciudad (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E8608214 ON "user" (ciudad_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649E8608214');
        $this->addSql('DROP SEQUENCE ciudad_id_seq CASCADE');
        $this->addSql('DROP TABLE ciudad');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677');
        $this->addSql('DROP INDEX UNIQ_8D93D649E8608214');
        $this->addSql('ALTER TABLE "user" DROP ciudad_id');
        $this->addSql('ALTER TABLE "user" DROP nombre');
        $this->addSql('ALTER TABLE "user" DROP apellido1');
        $this->addSql('ALTER TABLE "user" DROP apellido2');
        $this->addSql('ALTER TABLE "user" RENAME COLUMN username TO email');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d649e7927c74 ON "user" (email)');
    }
}
